<?php

namespace Database\Factories;

use App\Models\CandidatoModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoModelFactory extends Factory
{
    protected $model = CandidatoModel::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
        ];
    }
}

