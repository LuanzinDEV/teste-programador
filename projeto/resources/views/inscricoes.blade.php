@extends('layouts.layout')

@section('titulo') Inscrições  @endsection

@section('conteudo')

    <form action="{{ route('filtrarInscricoes') }}" method="GET" class="formulario">
        <label for="email">Buscar por E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Digite o e-mail" value="{{ request('email') }}">
        <button id="buscar" type="submit">Buscar</button>
    </form>

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
                    <th><a href="{{ route('verInscricoes', ['campo' => 'vaga_titulo', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">VAGA</a></th>
                    <th><a href="{{ route('verInscricoes', ['campo' => 'candidato_nome', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">CANDIDATO</a></th>
                    <th><a href="{{ route('verInscricoes', ['campo' => 'email', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">E-MAIL</a></th>
                    <th><a href="{{ route('verInscricoes', ['campo' => 'data_inscricao', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">DATA DE INSCRIÇÃO</a></th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscricoes as $inscricao)
                    <tr class="linha">
                        <td class="celula">{{ $inscricao->vaga->titulo }}</td>
                        <td class="celula">{{ $inscricao->candidato->nome }}</td>
                        <td class="celula">{{ $inscricao->candidato->email }}</td>
                        <td class="celula">{{ $inscricao->created_at->format('d/m/Y H:i') }}</td>
                        <td class="celula">
                            <form action="{{ route('deletarInscricao', ['id' => $inscricao->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="acao excluir" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $inscricoes->links('pagination::bootstrap-5') }}
    </div>

@endsection
