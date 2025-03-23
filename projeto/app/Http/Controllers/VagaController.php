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

    public function criarVaga(Request $request){
        switch($request->status){
            case "Aberta": 
                $status = 1;
            break;
            case "Fechada":
                $status = 0;
            break;
            default:
                $status = 1;
        }

        $vaga = VagaModel::create ([
            'titulo' => $request->titulo,
            'descricao'=> $request->descricao,
            'tipo' => $request->tipo,
            'status' =>  $status
        ]);

        session()->flash('success', 'Vaga criada com sucesso!');
        return redirect()->route('formVaga');
    }

    public function formAtulizaVaga(Request $request){
        $vaga = VagaModel::find($request->id);

        switch($request->status){
            case "Aberta": 
                $status = 1;
            break;
            case "Fechada":
                $status = 0;
            break;
            default:
            $status = null;
            break;
        }

        return view('atualizarVaga', [
            'vaga' => $vaga,
            'status' => $status
        ]);
    }

    public function atualizaVaga(Request $request){
        $vaga = VagaModel::find($request->id);

        if (!$vaga) {
            return redirect()->route('home')->with('error', 'Vaga não encontrada!');
        }

        switch($request->status){
            case "Aberta": 
                $status = 1;
            break;
            case "Fechada":
                $status = 0;
            break;
        }

        $vaga->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'status' => $status
        ]);

        session()->flash('success', 'Vaga atualizada com sucesso!');
        return redirect()->route('home');
    }

    public function deletarVaga(Request $request)
    {
        $vaga = VagaModel::find($request->id);

        if (!$vaga) {
            return redirect()->route('home')->with('error', 'Vaga não encontrada!');
        }

        $vaga->delete();

        return redirect()->route('home')->with('success', 'Vaga excluída com sucesso!');
    }

    
}
