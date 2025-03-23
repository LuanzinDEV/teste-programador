@extends('layouts.layout') 

@section('titulo') Criar Vaga @endsection

@section('conteudo')
    <div class="mensagem">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="conteudo_vaga">
        <div class="conteudo_esquerdo">
            <h2>Criar Nova Vaga</h2>
        </div>

        <div class="conteudo_direito">
            <form action="{{ route('criarVaga') }}" method="POST" class="formulario">
                @csrf

                <div class="form-group">
                    <label for="titulo" class="rotulo">Título da Vaga</label>
                    <input type="text" id="titulo" name="titulo" class="campo" placeholder="Título da vaga" required>
                </div>

                <div class="form-group">
                    <label for="descricao" class="rotulo">Descrição da Vaga</label>
                    <textarea id="descricao" name="descricao" class="campo" placeholder="Descrição detalhada da vaga" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tipo" class="rotulo">Tipo de Vaga</label>
                    <select id="tipo" name="tipo" class="campo" required>
                        <option value="CLT">CLT</option>
                        <option value="PJ">PJ</option>
                        <option value="Freelancer">Freelancer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="rotulo">Status da Vaga</label>
                    <select id="status" name="status" class="campo" required>
                        <option value="Aberta">Aberta</option>
                        <option value="Fechada">Fechada</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="botao">Criar Vaga</button>
                </div>
            </form>
        </div>
    </div>
@endsection
