<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatoModel;

class CandidatoController extends Controller
{
    protected $fillable = ['nome', 'email', 'telefone'];

    public function listarTodosCandidatos(Request $request){
        $campo = $request->get('campo', 'nome');
        $direcao = $request->get('direcao', 'asc');

        if (!in_array($direcao, ['asc', 'desc'])) {
            $direcao = 'asc';
        }

        $candidatos = CandidatoModel::orderBy($campo, $direcao)->paginate(20);

        return view('candidatos', compact('candidatos', 'campo', 'direcao'));
    }

    public function verCandidato(Request $request){
        $candidato = CandidatoModel::find($request->id);

        return view('candidato', compact('candidato'));
    }

    public function formCandidato(){
        return view('criarCandidato');
    }

    public function criarCandidato(Request $request){
        $candidato = CandidatoModel::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        session()->flash('success', 'Candidato criado com sucesso!');
        return redirect()->route('formCandidato');
    }

    public function formAtualizaCandidato(Request $request){
        $candidato = CandidatoModel::find($request->id);

        return view('atualizarCandidato', compact('candidato'));
    }

    public function atualizaCandidato(Request $request){
        $candidato = CandidatoModel::find($request->id);

        if (!$candidato) {
            return redirect()->route('home')->with('error', 'Candidato não encontrado!');
        }

        $candidato->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone
        ]);

        session()->flash('success', 'Candidato atualizado com sucesso!');
        return redirect()->route('home');
    }

    public function deletarCandidato(Request $request){
        $candidato = CandidatoModel::find($request->id);

        if (!$candidato) {
            return redirect()->route('home')->with('error', 'Candidato não encontrado!');
        }

        $candidato->delete();

        return redirect()->route('home')->with('success', 'Candidato excluído com sucesso!');
    }

}
