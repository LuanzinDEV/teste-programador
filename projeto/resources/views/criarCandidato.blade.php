@extends('layouts.layout')

@section('titulo')
    Criar Perfil
@endsection

@section('conteudo')
    <div class="mensagem">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="conteudo_candidato">
        <div class="conteudo_esquerdo">
            <h2>Criar Novo Perfil de Candidato</h2>
        </div>

        <div class="conteudo_direito">
            <form action="{{ route('criarCandidato') }}" method="POST" class="formulario">
                @csrf

                <div class="form-group">
                    <label for="nome" class="rotulo">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="campo" placeholder="Seu nome completo"
                        required>
                </div>

                <div class="form-group">
                    <label for="email" class="rotulo">E-mail</label>
                    <input type="email" id="email" name="email" class="campo" placeholder="Seu e-mail" required>
                </div>

                <div class="form-group">
                    <label for="telefone" class="rotulo">Telefone</label>
                    <input type="tel" id="telefone" name="telefone" class="campo" placeholder="Seu telefone" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="botao">Criar Perfil</button>
                </div>
            </form>
        </div>
    </div>
@endsection
