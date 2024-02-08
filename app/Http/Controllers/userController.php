<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function index()
    {
        return view('login');
    } 
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();

        return to_route('dashboard')->with('success', 'Vous êtes bien connecté ');
    }

    return back()->withErrors([
        'email'=> 'Email ou mot de passe incorrect.'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout(); 

        return redirect()->route('login'); 
    }

}
