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
        $name = $this->faker->unique()->sentence(); // Define o valor de nome antes para colocar em uma variável
        return [
            'nome' => $name, // define nome
            'descricao' => $this->faker->paragraph(), // define a descricao como um parágrafo fake
            'preco' => $this->faker->randomNumber(2), // gera um número aleatório para colocar em preco
            'slug' => Str::slug($name), // gera uma url com a classe Str
            'imagem' => $this->faker->imageUrl(400, 400), // gera a url de uma imagem de dimensão 400x400
            'id_user' => User::pluck('id')->random(), // Extrai randomicamente um dos Ids da tabela users
            'id_categoria' => Categoria::pluck('id')->random(), // Extrai randomicamente um dos Ids da tabela categorias
        ];
    }
}
