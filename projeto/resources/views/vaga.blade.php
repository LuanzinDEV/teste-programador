@extends('layouts.layout') 

@section('titulo') Vaga @endsection

@section('conteudo')
    <div class="conteudo_vaga">
        <div class="conteudo_esquerdo">
                <h2>{{$vaga->titulo}}</h2>
                <p><strong>Tipo:</strong> {{$vaga->tipo}}</p>
                <p><strong>Status:</strong> {{$vaga->status}}</p>
        </div>

        <div class="conteudo_direito">
            <p>{{$vaga->descricao}}</p>
        </div>
    </div>
@endsection