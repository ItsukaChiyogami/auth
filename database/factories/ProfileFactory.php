<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProfileFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->username(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }

}
