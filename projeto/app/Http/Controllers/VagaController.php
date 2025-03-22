<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VagaModel;

class VagaController extends Controller
{
    public function listarTodasVagas(Request $request){
        $campo = $request->get('campo', 'titulo');
        $direcao = $request->get('direcao', 'asc');

        if (!in_array($direcao, ['asc', 'desc'])){
           $direcao = 'asc';
        }

        $vagas = VagaModel::orderBy($campo, $direcao)->paginate(20);

        return view('home', compact('vagas', 'campo', 'direcao'));
    }
}
