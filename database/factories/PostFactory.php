<?php

namespace Database\Factories;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'company_id' => Company::inRandomOrder()->first()->id,
            'job_title' => $this->faker->jobTitle,
            'district' => $this->faker->citySuffix,
            'city' => $this->faker->city,
            'province' => $this->faker->city,
            'remote' => $this->faker->boolean,
            'is_parttime' => $this->faker->boolean,
            'min_salary' => $this->faker->numberBetween(10000, 50000),
            'max_salary' => $this->faker->numberBetween(50000, 100000),
            'current_salary' => $this->faker->numberBetween(10000, 100000),
            'requirement' => $this->faker->text,
            'start_date' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'end_date' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
            'number_applicants' => $this->faker->numberBetween(0, 100),
            'status' => $this->faker->randomElement([0, 1, 2]), // Integer values for status
            'is_pinned' => $this->faker->boolean,
            'slug' => Str::slug($this->faker->sentence),
            'deleted_at' => null, // No deletion by default
        ];
    }

}
