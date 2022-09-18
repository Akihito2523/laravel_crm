<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CrmFactory extends Factory
 {
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $faker = \Faker\Factory::create('ja_JP');
        return [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'zipcode' => $faker->zipcode(),
            'address' => $faker->address(),
            'tel' => $faker->tel(),
        ];
    }
}
