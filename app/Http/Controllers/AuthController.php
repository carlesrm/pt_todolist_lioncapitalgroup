<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    function loginView(Request $request)
    {
        return view('auth.login');
    }

    function loginPost(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $fields = $request->only('email', 'password');

        if (auth()->attempt($fields)) {
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->withErrors(['Email o contraseña incorrectos']);
    }

    function registerView(Request $request)
    {
        return view('auth.register');
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $email = $request->email;
        $password = $request->password;

        $user = User::createUser($request->name, $email, $password);

        if ($user) {
            if (auth()->attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended(route('home'));
            }

            return redirect(route('login'))->with('success', 'Usuario creado correctamente');
        }

        return redirect(route('register'))->withErrors(['Error al crear el usuario']);
    }

    function logout()
    {
        auth()->logout();

        return redirect(route('home'));
    }
}
