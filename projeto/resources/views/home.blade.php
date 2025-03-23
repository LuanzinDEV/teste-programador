@extends('layouts.layout') 

@section('titulo') Home  @endsection

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
    
                            <a href="{{route('formAtulizaVaga', ['id' => $vaga->id])}}" class="acao editar" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>
    
                            <form action="{{ route('deletarInscricao', ['id' => $vaga->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="acao excluir" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
    
                            <button title="Candidatar-se">
                                <i class="fa fa-check-circle"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vagas->links('pagination::bootstrap-5') }}

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
    </div>

    


@endsection
