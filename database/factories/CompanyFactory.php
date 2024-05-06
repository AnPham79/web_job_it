<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'name'      => $this->faker->company,
            'address'   => $this->faker->streetAddress,
            'address2'  => $this->faker->buildingNumber,
            'district'  => $this->faker->streetName,
            'city'      => $this->faker->city,
            // 'country'  => $this->faker->country,
            'country'  => 'Việt Nam',
            'zipcode'   => $this->faker->postcode,
            'phone'     => $this->faker->phoneNumber,
            'email'     => $this->faker->email,
            'logo'      => $this->faker->imageUrl()
        ];
    }
}
