<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Models\Company;
use App\Models\Post;
use Faker\Provider\vi_VN;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Language::factory(10)->create();
        // Company::factory(20)->create();
        // // cách 1
        // Employee::factory(50)->create();
        // cách 2
        Post::factory(20)->create();
        // $this->call(EmployeeSeeder::class);
    }
}
