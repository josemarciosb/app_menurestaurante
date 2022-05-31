<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function save(Request $request)
    {

        $user = new User();

        $verifyUser = User::where('username', $request->username)->first();

        if (empty($verifyUser)) {
            $user->username = $request->username;
        } else {
            return redirect()->back()->withInput()->withErrors(['Nome de usuário já cadastrado em outro usuário!']);
        }


        if ($request->password === $request->confirmPassword) {
            $user->password = Hash::make($request->password);
        } else {
            return redirect()->back()->withInput()->withErrors(['Senhas diferentes!']);
        }

        $user->openAtMoment = 'não';

        $user->save();

        return redirect()->back()->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit()
    {

        if (Auth::check()) {

            $id = Auth::id();
            $user = User::where('id', $id)->first();

            return view('user.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('home');
    }


    public function update(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();

        $verifyUser = User::where('username', $request->username)->first();

        if (empty($verifyUser) or $request->username != $verifyUser->name) {
            $user->username = $request->username;
        } else {
            return redirect()->back()->withInput()->withErrors(['Nome de usuário já cadastrado em outro usuário!']);
        }

        $user->name = $request->name;

        if (!empty($request->password) or !empty($request->confirmPassword)) {
            if ($request->password === $request->confirmPassword) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->withInput()->withErrors(['Senhas diferentes!']);
            }
        }

        $user->update();

        return redirect()->back()->with('success', 'Usuário atualizado com sucesso');
    }


    public static function userType()
    {

        if (Auth::check()) {

            $id = Auth::id();
            $user = User::where('id', $id)->first();

            $typeUser = $user->type;

            return $typeUser;
        } else {

            return '';
        }
    }

    public function login()
    {
        return view('user.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return redirect()->back()->withInput()->withErrors(['Usuário ou senha incorretos!']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public static function openAtMoment()
    {

        $user = User::where('type', 'owner')->first();
        $open = $user->openAtMoment;

        return $open;
    }

    public function openStore()
    {

        $user = User::where('type', 'owner')->first();
        $open = $user->openAtMoment;

        if ($open === 'não') {
            $user->openAtMoment = 'sim';
            $user->update();
        } else if ($open === 'sim') {
            $user->openAtMoment = 'não';
            $user->update();
        }

        return back();
    }
}
