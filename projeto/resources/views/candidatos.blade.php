@extends('layouts.layout')

@section('titulo') Candidatos @endsection

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
                    <th><a href="{{ route('candidatos', ['campo' => 'nome', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">NOME</a></th>
                    <th><a href="{{ route('candidatos', ['campo' => 'email', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">EMAIL</a></th>
                    <th><a href="{{ route('candidatos', ['campo' => 'telefone', 'direcao' => $direcao === 'asc' ? 'desc' : 'asc']) }}">TELEFONE</a></th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($candidatos as $candidato)
                    <tr class="linha">
                        <td class="celula">{{ $candidato->nome }}</td>
                        <td class="celula">{{ $candidato->email }}</td>
                        <td class="celula">{{ $candidato->telefone }}</td>
                        <td class="celula">
                            <a href="{{ route('verCandidato', ['id' => $candidato->id]) }}" class="acao visualizar" title="Visualizar">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a href="{{ route('formAtualizaCandidato', ['id' => $candidato->id]) }}" class="acao editar" title="Editar">
                                <i class="fa fa-edit"></i>
                            </a>

                            <form action="{{ route('deletarCandidato', ['id' => $candidato->id]) }}" method="POST" style="display:inline;">
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
        {{ $candidatos->links('pagination::bootstrap-5') }}
    </div>

@endsection
