<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\VagaModel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VagaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_listar_todas_vagas()
    {
        VagaModel::factory()->count(5)->create();
        $response = $this->get(route('home'));
        $response->assertStatus(200);
        $response->assertViewHas('vagas');
    }

    public function test_ver_vaga_encontrada()
    {
        $vaga = VagaModel::factory()->create();
        $response = $this->get(route('verVaga', ['id' => $vaga->id]));
        $response->assertStatus(200);
        $response->assertViewHas('vaga', $vaga);
    }

    public function test_ver_vaga_nao_encontrada()
    {
        $response = $this->get(route('verVaga', ['id' => 999]));
        $response->assertStatus(404);
        $response->assertJson(['error' => 'Vaga nao encontrada']);
    }

    public function test_criar_vaga()
    {
        $data = [
            'titulo' => 'Vaga Teste',
            'descricao' => 'Descrição da vaga',
            'tipo' => 'Freelancer',
        ];
        $response = $this->post(route('criarVaga'), $data);
        $response->assertStatus(201);
        $response->assertJson(['message' => 'Vaga criada com sucesso!']);
    }

    public function test_form_vaga()
    {
        $response = $this->get(route('formVaga'));
        $response->assertStatus(200);
        $response->assertViewIs('criarVaga');
    }
}
