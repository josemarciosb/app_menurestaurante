<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Marmitex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function registerDish()
    {

        if (Auth::check()) {
            return view('admin.registerFood');
        }

        return redirect()->route('home');
    }

    public function saveDish(Request $request)
    {

        $dish = new Dish();

        $dish->name = $request->name;
        $dish->category = $request->category;

        $image = $request->image;
        $dish->image_path = $image->store('produtos/pratos');

        $dish->save();

        return redirect()->back()->with('success', 'Prato cadastrado com sucesso!');
    }

    public function showBuffet()
    {

        $price = $_GET['price'];
        $size = $_GET['size'];

        $marmitex = Marmitex::where([['size', $size], ['price', $price]])->first();

        if (empty($marmitex)) {
            return redirect()->back();
        }

        $guarnicoesArroz = Dish::where([['category', 'guarnição'], ['name', 'like', '%arroz%']])->get();
        $guarnicoesFeijao = Dish::where([['category', 'guarnição'], ['name', 'like', '%feijão%']])->get();
        $carnes = Dish::where('category', 'carne')->get();
        $massas = Dish::where('category', 'massa')->get();
        $acompanhamentos = Dish::where('category', 'acompanhamento')->get();
        $saladas = Dish::where('category', 'salada')->get();

        return view('site.buffet', [
            'guarnicoesArroz' => $guarnicoesArroz,
            'guarnicoesFeijao' => $guarnicoesFeijao,
            'carnes' => $carnes,
            'massas' => $massas,
            'acompanhamentos' => $acompanhamentos,
            'saladas' => $saladas,
            'price' => $price,
            'size' => $size,
            'marmitex' => $marmitex
        ]);
    }

    public function removeDish()
    {

        if (Auth::check()) {
            $dishes = Dish::orderBy('category', 'ASC')->get();

            return view('admin.removeDish', [
                'dishes' => $dishes
            ]);
        }

        return redirect()->route('home');
    }

    public function deleteDish(Request $request)
    {

        $id = $request->id;

        $dish = Dish::where('id', $id)->first();

        $dish->delete();

        return redirect()->back()->with('success', 'Prato excluído com sucesso!');
    }
}
