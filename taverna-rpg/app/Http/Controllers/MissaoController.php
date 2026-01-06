<?php

namespace App\Http\Controllers;

use App\Models\Missao;
use Illuminate\Http\Request;

class MissaoController extends Controller
{
    //listar (Substitui o antigo missoes.php)
    public function index()
    {
        //busca todas as missões, da mais recente para a mais antiga
        $missoes = Missao::orderBy('id', 'desc')->get();
        return view('missoes.index', compact('missoes'));
    }

    //salvar (Substitui salvar_missao.php)
    public function store(Request $request)
    {
        //validação automática
        $request->validate([
            'titulo' => 'required|min:5',       //mínimo de 5 letras para evitar títulos vazios
            'recompensa' => 'required|numeric', //tem que ser número
            'dificuldade' => 'required'
        ]);

        //salva no banco usando o Model
        Missao::create($request->all());

        return redirect()->route('missoes.index')->with('sucesso', 'Missão publicada!');
    }

    //tela de Edição (Substitui editar_missao.php)
    public function edit($id)
    {
        //busca a missão ou falha (mostra 404) se não existir
        $missao = Missao::findOrFail($id);
        return view('missoes.edit', compact('missao'));
    }

    //atualizar (Substitui atualizar_missao.php)
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|min:5',
            'recompensa' => 'required|numeric',
            'dificuldade' => 'required'
        ]);

        $missao = Missao::findOrFail($id);
        $missao->update($request->all());

        return redirect()->route('missoes.index')->with('sucesso', 'Missão atualizada!');
    }

    //excluir (Substitui excluir_missao.php)
    public function destroy($id)
    {
        Missao::destroy($id);
        return redirect()->route('missoes.index')->with('sucesso', 'Pergaminho rasgado (Missão excluída)!');
    }
}