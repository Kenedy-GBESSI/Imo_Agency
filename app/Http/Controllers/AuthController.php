<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('property.index'))->with('success','Connexion effective');
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Aucun utilisateur trouvé'
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route('home')->with('success','Déconnexion effective');
    }
}
