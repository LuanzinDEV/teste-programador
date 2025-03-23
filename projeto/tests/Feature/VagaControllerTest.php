<?php

namespace Tests\Feature;

use App\Models\VagaModel;
use Tests\TestCase;

class VagaControllerTest extends TestCase
{

    public function test_listar_todas_vagas()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_ver_vaga()
    {
        $vaga = VagaModel::factory()->create();
        $response = $this->get(route('verVaga', ['id' => $vaga->id]));
        $response->assertStatus(200);
    }

    public function test_criar_vaga()
    {
        $vagaData = [
            'titulo' => 'Vaga Teste',
            'descricao' => 'Descricao da vaga',
            'tipo' => 'CLT',
            'status' => 'Aberta'
        ];

        $response = $this->post(route('criarVaga'), $vagaData);
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Vaga criada com sucesso!');
    }

    public function test_atualiza_vaga()
    {
        $vaga = VagaModel::factory()->create();
        $vagaData = [
            'titulo' => 'Vaga Atualizada',
            'descricao' => 'Descricao atualizada',
            'tipo' => 'PJ',
            'status' => 'Fechada'
        ];

        $response = $this->post(route('atualizaVaga'), array_merge(['id' => $vaga->id], $vagaData));
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Vaga atualizada com sucesso!');
    }

    public function test_pausar_vaga()
    {
        $vaga = VagaModel::factory()->create();
        $response = $this->patch(route('pausarVaga', ['id' => $vaga->id]));
        $response->assertStatus(200);
        $response->assertJson(['succes' => 'Vaga pausada com sucesso']);
    }

    public function test_deletar_vaga()
    {
        $vaga = VagaModel::factory()->create();
        $response = $this->delete(route('deletarVaga', ['id' => $vaga->id]));
        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Vaga excluída com sucesso!');
    }

    public function test_despausar_vaga()
    {
        $vaga = VagaModel::factory()->create(['status' => 0]);
        $response = $this->patch(route('despausarVaga', ['id' => $vaga->id]));
        $response->assertStatus(200);
        $response->assertJson(['succes' => 'Vaga despausada com sucesso']);
    }

}
