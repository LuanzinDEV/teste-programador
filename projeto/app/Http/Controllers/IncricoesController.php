<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VagaModel;
use App\Models\CandidatoModel;
use App\Models\InscricaoModel;

class IncricoesController extends Controller
{
    public function candidatarEmUmaVaga(Request $request, $vaga_id)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $candidato = CandidatoModel::where('email', $email)->first();

        if ($candidato) {
            InscricaoModel::create([
                'candidato_id' => $candidato->id,
                'vaga_id' => $vaga_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Inscrição realizada com sucesso!',
            ]);
        } else {
            return response()->json([
                'status' => 'new_user',
                'message' => 'Usuário não encontrado. Redirecionando para cadastro.',
            ]);
        }
    }
}
