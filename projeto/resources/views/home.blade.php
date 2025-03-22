@extends('layouts.layout') 

@section('titulo') Teste @endsection

@section('conteudo')
    <h2>Conteúdo da Página Inicial</h2>
    <p>Bem-vindo à página inicial do meu site!</p>

    <table>
        <thead>
            <tr>
                <th><a href="{{ route('home', ['campo' => 'titulo', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">TITULO</a></th>
                <th><a href="{{ route('home', ['campo' => 'descricao', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">DESCRIÇÃO</a></th>
                <th><a href="{{ route('home', ['campo' => 'tipo', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">TIPO</a></th>
                <th><a href="{{ route('home', ['campo' => 'status', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">STATUS</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($vagas as $vaga)
                <tr>
                    <td>{{ $vaga->titulo }}</td>
                    <td>{{ $vaga->descricao }}</td>
                    <td>{{ $vaga->tipo }}</td>
                    <td>{{ $vaga->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $vagas->links('pagination::bootstrap-5') }}


@endsection
