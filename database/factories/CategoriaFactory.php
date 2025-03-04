<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  return [
            'nome' => $this->faker->unique()->word, // gera uma palavra fake única      
            'descricao' => $this->faker->text,
        ];
    }
}
