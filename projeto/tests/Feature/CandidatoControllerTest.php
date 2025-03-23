<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\CandidatoModel;
use Illuminate\Support\Facades\Session;

class CandidatoControllerTest extends TestCase
{

    public function test_listar_todos_candidatos()
    {
        $candidatos = CandidatoModel::factory()->count(5)->create();
        $response = $this->get(route('candidatos'));
        $response->assertStatus(200);
    }

    public function test_criar_candidato()
    {
        $data = [
            'nome' => 'João',
            'email' => 'joao@example.com',
            'telefone' => '123456789'
        ];
        $response = $this->post(route('criarCandidato'), $data);
    }

    public function test_atualizar_candidato()
    {
        $candidato = CandidatoModel::factory()->create();
        $data = [
            'nome' => 'Carlos',
            'email' => 'carlos@example.com',
            'telefone' => '987654321'
        ];
        $response = $this->post(route('atualizaCandidato', $candidato->id), $data);
        $response->assertRedirect(route('home'));
    }

    public function test_deletar_candidato()
    {
        $candidato = CandidatoModel::factory()->create();
        $response = $this->delete(route('deletarCandidato', $candidato->id));
        $response->assertRedirect(route('home'));
    }
}
