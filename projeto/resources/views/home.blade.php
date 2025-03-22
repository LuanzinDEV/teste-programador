@extends('layouts.layout') 

@section('titulo') Home  @endsection

@section('conteudo')
    <div class="conteudo-tabela">
        <table class="tabela">
            <thead class="cabecalho">
                <tr>
                    <th><a href="{{ route('home', ['campo' => 'titulo', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">TITULO</a></th>
                    <th><a href="{{ route('home', ['campo' => 'descricao', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">DESCRIÇÃO</a></th>
                    <th><a href="{{ route('home', ['campo' => 'tipo', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">TIPO</a></th>
                    <th><a href="{{ route('home', ['campo' => 'status', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">STATUS</a></th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vagas as $vaga)
                    <tr class="linha">
                        <td class="celula">{{ $vaga->titulo }}</td>
                        <td class="celula">{{ $vaga->descricao }}</td>
                        <td class="celula">{{ $vaga->tipo }}</td>
                        <td class="celula">
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
                        </td>                        
                        <td class="celula">
                            <a href="{{route('verVaga', ['id' => $vaga->id])}}" class="acao visualizar" title="Visualizar">
                                <i class="fa fa-eye"></i>
                            </a>
    
                            <a href="#" class="acao editar" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
    
                            <button type="button" class="acao excluir" title="Excluir" onclick="confirm('Tem certeza que deseja excluir?')">
                                <i class="fa fa-trash"></i>
                            </button>
    
                            <a href="#" class="acao candidatar" title="Candidatar-se">
                                <i class="fa fa-check-circle"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vagas->links('pagination::bootstrap-5') }}
    </div>

    


@endsection
