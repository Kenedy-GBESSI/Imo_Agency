<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title' => $title = $this->faker->sentence(6,true),
            'description' => $this->faker->sentences(3,true),
            'slug' => Str::slug($title) ,
            'air_layer' => $this->faker->numberBetween(10,100),
            'price' => $this->faker->numberBetween(10000,1000000),
            'bedroom' => $rooms = $this->faker->numberBetween(1,9),
            'rooms_num'=> $this->faker->numberBetween(1,$rooms),
            'floor' => $this->faker->numberBetween(1,9),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
        ];
    }

    public function unverified() : static {

        return $this->state(fn (array $attributes) => [
            'sold' => $this->faker->boolean(),
        ]);
    }
}
