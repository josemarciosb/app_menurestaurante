<?php

namespace App\Http\Controllers;

use App\Models\Marmitex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarmitexController extends Controller
{

    public function registerMarmitex()
    {

        if (Auth::check()) {
            return view('admin.registerMarmitex');
        }

        return redirect()->route('home');
    }

    public function saveMarmitex(Request $request)
    {

        $marmitex = new Marmitex();

        $verifySize = Marmitex::where('size', $request->size)->first();

        if (!(empty($verifySize))) {
            return redirect()->back()->withErrors('Este tamanho de marmitex já está cadastrado!
            Se deseja modificar ou excluir vá em Produtos > Editar marmitex!');
        } else {

            $marmitex->size = $request->size;
            $marmitex->price = $request->price;
            $marmitex->qtd_guarnicao = $request->qtd_guarnicao;
            $marmitex->qtd_massa = $request->qtd_massa;
            $marmitex->qtd_carne = $request->qtd_carne;
            $marmitex->qtd_acompanhamento = $request->qtd_acompanhamento;
            $marmitex->qtd_salada = $request->qtd_salada;

            $marmitex->save();
        }

        return redirect()->back()->with('success', 'Marmitex cadastrado com sucesso!');
    }

    public function editMarmitex(Request $request)
    {

        if (Auth::check()) {
            $marmitexes = Marmitex::all();

            return view('admin.editMarmitex', [
                'marmitexes' => $marmitexes
            ]);
        }

        return redirect()->route('home');
    }

    public function updateMarmitex(Request $request)
    {

        $marmitex = Marmitex::where('id', $request->id)->first();

        $verifySize = Marmitex::where('size', $request->size)->first();

        if (!(empty($verifySize)) and ($marmitex->size != $request->size)) {
            return redirect()->back()->withErrors('Este tamanho de marmitex já está cadastrado!');
        }

        $marmitex->size = $request->size;
        $marmitex->price = $request->price;
        $marmitex->qtd_guarnicao = $request->qtd_guarnicao;
        $marmitex->qtd_massa = $request->qtd_massa;
        $marmitex->qtd_carne = $request->qtd_carne;
        $marmitex->qtd_acompanhamento = $request->qtd_acompanhamento;
        $marmitex->qtd_salada = $request->qtd_salada;

        $marmitex->update();

        return redirect()->back()->with('success', 'Marmitex atualizado com sucesso!');
    }

    public function deleteMarmitex()
    {

        $id = $_GET['id'];

        $marmitex = Marmitex::where('id', $id)->first();

        $marmitex->delete();

        return redirect()->back()->with('success', 'Marmitex excluído com sucesso!');
    }
}
