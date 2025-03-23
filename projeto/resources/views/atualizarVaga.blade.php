@extends('layouts.layout') 

@section('titulo') Criar Vaga @endsection

@section('conteudo')
    <div class="conteudo_vaga">
        <div class="conteudo_esquerdo">
            <h2>Atualizar Vaga</h2>
        </div>

        <div class="conteudo_direito">
            <form action="{{ route('atualizaVaga') }}" method="POST" class="formulario">
                @csrf
                <input type="hidden" name="id" value="{{ $vaga->id }}">

                <div class="form-group">
                    <label for="titulo" class="rotulo">Título da Vaga</label>
                    <input type="text" id="titulo" name="titulo" class="campo" placeholder="Título da vaga" value="{{ $vaga->titulo }}" required>
                </div>

                <div class="form-group">
                    <label for="descricao" class="rotulo">Descrição da Vaga</label>
                    <textarea id="descricao" name="descricao" class="campo" placeholder="Descrição detalhada da vaga" rows="4" required>{{ $vaga->descricao }}</textarea>
                </div>

                <div class="form-group">
                    <label for="tipo" class="rotulo">Tipo de Vaga</label>
                    <select id="tipo" name="tipo" class="campo" required>
                        <option value="CLT" {{ $vaga->tipo == 'CLT' ? 'selected' : '' }}>CLT</option>
                        <option value="PJ" {{ $vaga->tipo == 'PJ' ? 'selected' : '' }}>PJ</option>
                        <option value="Freelancer" {{ $vaga->tipo == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status" class="rotulo">Status da Vaga</label>
                    <select id="status" name="status" class="campo" required>
                        <option value="Aberta" {{ $status == 1 ? 'selected' : '' }}>Aberta</option>
                        <option value="Fechada" {{ $status == 0 ? 'selected' : '' }}>Fechada</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="botao">Atualizar Vaga</button>
                </div>
            </form>
        </div>
    </div>
@endsection
