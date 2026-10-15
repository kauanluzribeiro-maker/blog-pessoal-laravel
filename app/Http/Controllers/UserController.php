<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function login(Request $request){
        $campos = $request->validate([
            'email' => ['required' , 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt([
            'email' => $campos['email'],
            'password' => $campos['password']
        ])) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect('/?login=1')
            ->withErrors([
                'email' => 'E-mail ou senha inválidos.'
            ])
            ->withInput();
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function registrar(Request $request){
        $campos = $request->validate([
        'name' => ['required' , 'min:3' , 'max:20',
        'alpha_num'],
        'email' => ['required' , 'email'],
        'password' => 'required'
    ]);

    $campos['password'] = bcrypt($campos['password']);
    $user = User::create($campos);

    return redirect('/?login=1')->with('success', 'Cadastro realizado com sucesso! Agora faça login.');
    
    }
}