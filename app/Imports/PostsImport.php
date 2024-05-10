<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Company;
use App\Models\Language;

class PostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $array)
    {
        return new Post([
            'job_title' => $array[0],
            'city' => $array[2],

            Company::firstOrCreate([
                'name' => $array[1],
            ])
        ]);
    }
}