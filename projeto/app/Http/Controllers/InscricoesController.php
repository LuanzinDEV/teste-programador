<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VagaModel;
use App\Models\CandidatoModel;
use App\Models\InscricaoModel;
use App\Http\Controllers\CandidatoController;

class InscricoesController extends Controller
{
    public function candidatarEmUmaVaga(Request $request, $vaga_id)
    {
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
    
}
