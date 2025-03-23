@extends('layouts.layout') 

@section('titulo') Atualizar Perfil @endsection

@section('conteudo')
    <div class="conteudo_candidato">
        <div class="conteudo_esquerdo">
            <h2>Atualizar Perfil</h2>
        </div>

        <div class="conteudo_direito">
            <form action="{{ route('atualizaCandidato') }}" method="POST" class="formulario">
                @csrf
                <input type="hidden" name="id" value="{{ $candidato->id }}">

                <div class="form-group">
                    <label for="nome" class="rotulo">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="campo" placeholder="Seu nome completo" value="{{ $candidato->nome }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="rotulo">E-mail</label>
                    <input type="email" id="email" name="email" class="campo" placeholder="Seu e-mail" value="{{ $candidato->email }}" required>
                </div>

                <div class="form-group">
                    <label for="telefone" class="rotulo">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="campo" placeholder="Seu telefone" value="{{ $candidato->telefone }}" required>
                </div>

                <div class="form-group">
                    <label for="curriculo" class="rotulo">Currículo</label>
                    <input type="file" id="curriculo" name="curriculo" class="campo" accept=".pdf,.doc,.docx">
                    <small>Se você deseja atualizar seu currículo, envie o novo arquivo.</small>
                </div>

                <div class="form-group">
                    <button type="submit" class="botao">Atualizar Perfil</button>
                </div>
            </form>
        </div>
    </div>
@endsection
