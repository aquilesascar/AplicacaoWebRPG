<?php

namespace App\Http\Controllers;

use App\Models\Heroi;
use Illuminate\Http\Request;

class HeroiController extends Controller
{
    //lista os heróis (Substitui herois.php)
    public function index()
    {
        $herois = Heroi::orderBy('id', 'desc')->get();
        return view('herois.index', compact('herois'));
    }

    //salva novo herói (Substitui salvar_heroi.php)
    public function store(Request $request)
    {
        //validação automática!
        $request->validate([
            'nome' => 'required',
            'nivel' => 'required|integer|min:1|max:100'
        ]);

        Heroi::create($request->all());

        return redirect()->route('herois.index');
    }

    //exibe formulário de edição (Substitui editar_heroi.php)
    public function edit($id)
    {
        $heroi = Heroi::findOrFail($id);
        return view('herois.edit', compact('heroi'));
    }

    //atualiza no banco (Substitui atualizar_heroi.php)
    public function update(Request $request, $id)
    {
        $heroi = Heroi::findOrFail($id);
        $heroi->update($request->all());
        return redirect()->route('herois.index');
    }

    //remove do banco (Substitui excluir_heroi.php)
    public function destroy($id)
    {
        Heroi::destroy($id);
        return redirect()->route('herois.index');
    }
}