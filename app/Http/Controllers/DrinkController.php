<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrinkController extends Controller
{
    public function registerDrink()
    {
        if (Auth::check()) {

            return view('admin.registerDrink');
        }

        return redirect()->route('home');
    }

    public function saveDrink(Request $request)
    {

        $drink = new Drink();

        $drink->name = $request->name;
        $drink->size = $request->size;
        $drink->type = $request->type;
        $drink->price = $request->price;

        $image = $request->image;
        $drink->image_path = $image->store('produtos/bebidas');

        $drink->save();

        return redirect()->back()->with('success', 'Bebida cadastrada com sucesso');
    }

    public function showDrink()
    {

        $drinks = Drink::all();

        return view('site.drinks', [
            'drinks' => $drinks
        ]);
    }

    public function removeDrink()
    {

        if (Auth::check()) {
        $drinks = Drink::all();

        return view('admin.removeDrink', [
            'drinks' => $drinks
        ]);

        }

        return redirect()->route('home');
    }


    public function deleteDrink(Request $request)
    {

        $id = $request->id;

        $drink = Drink::where('id', $id)->first();

        $drink->delete();

        return redirect()->back()->with('success', 'Bebida excluída com sucesso!');
    }
}
