<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VagaModel;

class VagaController extends Controller
{
    protected $fillable = ['titulo', 'tipo', 'status', 'descricao'];

    public function listarTodasVagas(Request $request){
        $campo = $request->get('campo', 'titulo');
        $direcao = $request->get('direcao', 'asc');

        if (!in_array($direcao, ['asc', 'desc'])){
           $direcao = 'asc';
        }

        $vagas = VagaModel::orderBy($campo, $direcao)->paginate(20);

        return view('home', compact('vagas', 'campo', 'direcao'));
    }

    public function verVaga(Request $request)
    {
        $vaga = VagaModel::find($request->id);

        if (!$vaga) {
            return response()->json(['error' => 'Vaga nao encontrada'], 404);
        }

        return view('vaga', compact('vaga'));
    }

    public function formVaga(){
        return view('criarVaga');
    }

    public function criarVaga(Resquest $resquest){
        $vaga = VagaModel::create ([
            'titulo' => $resquest->titulo,
            'descricao'=> $resquest->descricao,
            'tipo' => $request->tipo
        ]);

        return response()->json(['message' => 'Vaga criada com sucesso!', 'vaga' => $vaga], 201);
    }
}
