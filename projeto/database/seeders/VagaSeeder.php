<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VagaModel;

class VagaSeeder extends Seeder
{
    public function run()
    {
        VagaModel::factory()->count(100)->create();
    }
}
