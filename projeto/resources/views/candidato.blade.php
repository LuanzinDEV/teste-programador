@extends('layouts.layout')

@section('titulo')
    Candidato
@endsection

@section('conteudo')
    <div class="conteudo_candidato">
        <div class="conteudo_esquerdo">
            <h2>{{ $candidato->nome }}</h2>
            
        </div>
        
        <div class="conteudo_direito">
            <p><strong>Email:</strong> {{ $candidato->email }}</p>
            <p><strong>Telefone:</strong> {{ $candidato->telefone }}</p>
        </div>
    </div>

    <div id="modalCandidatar" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Insira seu e-mail</h2>
            <form id="formCandidatar">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <button id="btnModal" type="submit">Enviar</button>
            </form>
        </div>
    </div>

@endsection
