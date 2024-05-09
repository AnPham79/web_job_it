<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class PostsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'id' => $row['id'],
            'employee_id' => $row['employee_id'] ?? '',
            'company_id' => $row['company_id'] ?? '',
            'job_title' => $row['job_title'] ?? '',
            'district' => $row['job_title'] ?? '',
            'city' => $row['city'] ?? '',
            'province' => $row['province'] ?? '',
            'remote' => $row['remote'] ?? '',
            'is_parttime' => $row['is_parttime'] ?? '',
            'min_salary' => $row['min_salary'] ?? '',
            'max_salary' => $row['max_salary'] ?? '',
            'current_salary' => $row['current_salary'] ?? '',
            'requirement' => $row['requirement'] ?? '',
            'start_date' => Carbon::createFromFormat('Y-m-d', $row['start_date']) ?? '',
            'end_date' => Carbon::createFromFormat('Y-m-d', $row['end_date']) ?? '',
            'number_applicants' => $row['number_applicants'] ?? '',
            'status' => $row['status'] ?? '',
            'is_pinned' => $row['is_pinned'] ?? '',
            'slug' => $row['slug'] ?? '',
            'deleted_at' => $row['deleted_at'] ?? '',
        ]);
    }
}
