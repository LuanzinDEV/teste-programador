<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InscricaoModel;
use App\Models\CandidatoModel;
use App\Models\VagaModel;

class InscricaoSeeder extends Seeder
{
    public function run()
    {
        $candidatos = CandidatoModel::all();
        $vagas = VagaModel::all();

        foreach ($candidatos as $candidato) {
            $numVagas = rand(1, 5); 
            $vagasAleatorias = $vagas->random($numVagas);

            foreach ($vagasAleatorias as $vaga) {
                InscricaoModel::create([
                    'candidato_id' => $candidato->id,
                    'vaga_id' => $vaga->id,
                ]);
            }
        }
    }
}


