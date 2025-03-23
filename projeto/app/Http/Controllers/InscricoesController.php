<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VagaModel;
use App\Models\CandidatoModel;
use App\Models\InscricaoModel;
use App\Http\Controllers\CandidatoController;

class InscricoesController extends Controller
{
    public function candidatarEmUmaVaga(Request $request, $vaga_id){
        $email = $request->email;
        
        $candidato = CandidatoModel::where('email', $email)->first();
    
        if ($candidato) {
            $inscricaoExistente = InscricaoModel::where('candidato_id', $candidato->id)
                                                ->where('vaga_id', $vaga_id)
                                                ->first();
    
            if ($inscricaoExistente) {
                session()->flash('error', 'Você já é inscrito nessa vaga');
                return redirect()->route('home');
            }
    
            InscricaoModel::create([
                'candidato_id' => $candidato->id,
                'vaga_id' => $vaga_id,
            ]);
    
            session()->flash('success', 'Incrição realizada com sucesso!');
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Usuario não encontrado, cadastre-o!');
            return redirect()->route('formCandidato');
        }
    }
    
    public function verInscricoes(){
        $inscricoes = InscricaoModel::with('vaga', 'candidato')->paginate(20);
        
        return view('inscricoes', compact('inscricoes'));
    }

    public function filtrarInscricoes(Request $request){
        $email = $request->input('email');

        if ($email) {
            $inscricoes = InscricaoModel::whereHas('candidato', function($query) use ($email) {
                $query->where('email', 'like', '%' . $email . '%');
            })->paginate(20);
        } else {
            $inscricoes = InscricaoModel::paginate(20);
        }

        return view('inscricoes', compact('inscricoes'));
    }

    public function deletarInscricao(Request $request){
        $vaga = InscricaoModel::find($request->id);

        if (!$vaga) {
            return redirect()->route('verInscricoes')->with('error', 'Incricao nao encontrada!');
        }

        $vaga->delete();

        return redirect()->route('verInscricoes')->with('success', 'Vaga excluída com sucesso!');
    }
}
