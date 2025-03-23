<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CandidatoModel;
use App\Models\VagaModel;
use App\Models\InscricaoModel;

class InscricoesControllerTest extends TestCase
{

    public function test_candidatar_em_uma_vaga()
    {
        $candidato = CandidatoModel::factory()->create();
        $vaga = VagaModel::factory()->create();
        $data = ['email' => $candidato->email];
        $response = $this->post(route('candidatarEmUmaVaga', ['vaga_id' => $vaga->id]), $data);
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('inscricoes', [
            'candidato_id' => $candidato->id,
            'vaga_id' => $vaga->id
        ]);
    }

    public function test_ver_inscricoes()
    {
        $inscricao = InscricaoModel::factory()->create();
        $response = $this->get(route('verInscricoes'));
        $response->assertStatus(200);
    }

    public function test_filtrar_inscricoes_por_email()
    {
        $candidato = CandidatoModel::factory()->create();
        $vaga = VagaModel::factory()->create();
        $inscricao = InscricaoModel::factory()->create(['candidato_id' => $candidato->id, 'vaga_id' => $vaga->id]);
        $response = $this->get(route('filtrarInscricoes', ['email' => $candidato->email]));
        $response->assertStatus(200);
    }

    public function test_deletar_inscricao()
    {
        $inscricao = InscricaoModel::factory()->create();
        $response = $this->delete(route('deletarInscricao', $inscricao->id));
    }
}
