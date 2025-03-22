<?php

namespace Database\Factories;

use App\Models\VagaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class VagaModelFactory extends Factory
{
    protected $model = VagaModel::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->jobTitle(),
            'descricao' => $this->faker->paragraph(),
            'tipo' => $this->faker->randomElement(['CLT', 'PJ', 'Freelancer']),
            'status' => $this->faker->boolean(),
        ];
    }
}

