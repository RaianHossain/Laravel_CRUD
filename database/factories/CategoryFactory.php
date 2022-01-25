<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->word,
            'description'=>$this->faker->paragraph,
            'image' => $this->faker->image('storage/app/public', '200', '300', 'cats', false)
        ];
    }
}
