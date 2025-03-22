<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CandidatoModel;

class CandidatoSeeder extends Seeder
{
    public function run()
    {
        CandidatoModel::factory()->count(200)->create();
    }
}


