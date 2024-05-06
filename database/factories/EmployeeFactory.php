<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Company;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        // cách 1: Đơn giản, nhanh nhưng chậm
        return [
            'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'avatar' => $this->faker->imageUrl,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'phone' => $this->faker->phoneNumber,
            'link' => null,
            'role' => $this->faker->randomElement(['Admin', 'Applicant', 'HR']),
            'bio' => $this->faker->boolean ? $this->faker->word : null,
            'position' => $this->faker->jobTitle,
            'gender' => $this->faker->boolean,
            'city' => $this->faker->city,
            'company_id' => Company::inRandomOrder()->first()->id
        ];

        // cách 2: Quản lí tốt, nhanh nhưng cần quản lí chặc chẻ số lượng bảng ghi để tránh quá tải
        // $arr = [];

        // $faker = \Faker\Factory::create();

        // $company = Company::query()->pluck('id')->toArray();

        // for($i = 1; $i < 100; $i++) {
        //     $arr[] = [
        //         'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
        //         'avatar' => $this->faker->imageUrl,
        //         'email' => $this->faker->email,
        //         'password' => $this->faker->password,
        //         'phone' => $this->faker->phoneNumber,
        //         'link' => null,
        //         'role' => $this->faker->randomElement(['Admin', 'Applicant', 'HR']),
        //         'bio' => $this->faker->boolean ? $this->faker->word : null,
        //         'position' => $this->faker->jobTitle,
        //         'gender' => $this->faker->boolean,
        //         'city' => $this->faker->city,
        //         'company_id' => array_rand($company)
        //     ];
        // }

        // Employee::insert($arr);
    }
}
