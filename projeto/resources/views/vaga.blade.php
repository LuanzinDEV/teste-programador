@extends('layouts.layout')

@section('titulo')
    Vaga
@endsection

@section('conteudo')
    <div class="conteudo_vaga">
        <div class="conteudo_esquerdo">
            <h2>{{ $vaga->titulo }}</h2>
            <p><strong>Tipo:</strong> {{ $vaga->tipo }}</p>
            <p><strong>Status:</strong>
                @switch($vaga->status)
                    @case(1)
                        Aberto
                    @break

                    @case(0)
                        Fechado
                    @break

                    @default
                        Status desconhecido
                @endswitch
            </p>
        </div>

        <div class="conteudo_direito" style="margin: 50px">
            <p>{{ $vaga->descricao }}</p>

            @if (isset($vaga) && isset($vaga->status))
                <button id="btnCandidatar" data-status="{{ (int) ($vaga->status ?? 1) }}">Candidatar-se</button>
            @endif

            <form action="{{ $vaga->status == 0 ? route('despausarVaga', ['id' => $vaga->id]) : route('pausarVaga', ['id' => $vaga->id]) }}" method="POST" style="margin-top: 20px">
                @csrf
                @method('PATCH')
                <button type="submit" class="btnPausar">
                    {{ $vaga->status == 0 ? 'Vaga Pausada' : 'Pausar Vaga' }}
                </button>
            </form>
        </div>
              
    </div>

    <div id="modalCandidatar" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Insira seu e-mail</h2>
            <form action="{{ route('candidatarEmUmaVaga', ['vaga_id' => $vaga->id]) }}" id="formCandidatar" method="POST" class="formulario">
                @csrf
                
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
                <button id="btnModal" type="submit">Enviar</button>
            </form>
        </div>
    </div>

@endsection
