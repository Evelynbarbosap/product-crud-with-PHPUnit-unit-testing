<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(), //Gera nomes de produtos ficticios
            'price' => $this->faker->randomFloat(2, 0, 100), // Gera um preço aleatório entre 0 e 100 com até 2 casas decimais.
            'quantity' => $this->faker->randomNumber(2), // Gera uma quantidade aleatória de rodutos solicitados no postman.
            'description' => $this->faker->text, // Gera uns textinhos aleatórios para o campo de descrição.
        ];
    }
}
