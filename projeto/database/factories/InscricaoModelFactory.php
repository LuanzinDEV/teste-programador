<?php

namespace Database\Factories;

use App\Models\InscricaoModel;
use App\Models\CandidatoModel;
use App\Models\VagaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscricaoModelFactory extends Factory
{
    protected $model = InscricaoModel::class;

    public function definition()
    {
        return [
            'candidato_id' => CandidatoModel::factory(),
            'vaga_id' => VagaModel::factory(),
        ];
    }
}


