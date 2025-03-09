<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   

        $randomImages = [
            'https://dummyimage.com/400/ffffff/000000',
            'https://dummyimage.com/400/000000/ffffff',
            'https://dummyimage.com/400/ffa500/000000',
            'https://dummyimage.com/400/008080/000000',
            'https://dummyimage.com/400/000080/000000',
            'https://dummyimage.com/400/800080/000000',
            'https://dummyimage.com/400/008000/000000',
            'https://dummyimage.com/400/ff00ff/000000',
            'https://dummyimage.com/400/ff0000/000000',
            'https://dummyimage.com/400/800000/000000',
        ];

        $name = $this->faker->unique()->sentence(); // Define o valor de nome antes para colocar em uma variável
        return [
            'nome' => $name, // define nome
            'descricao' => $this->faker->paragraph(), // define a descricao como um parágrafo fake
            'preco' => $this->faker->randomNumber(2), // gera um número aleatório para colocar em preco
            'slug' => Str::slug($name), // gera uma url com a classe Str
            'imagem' => $randomImages[rand(0,9)], // gera a url de uma imagem de dimensão 400x400
            'id_user' => User::pluck('id')->random(), // Extrai randomicamente um dos Ids da tabela users
            'id_categoria' => Categoria::pluck('id')->random(), // Extrai randomicamente um dos Ids da tabela categorias
        ];
    }
}
