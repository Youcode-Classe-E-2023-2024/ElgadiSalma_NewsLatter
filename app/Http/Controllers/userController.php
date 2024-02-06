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
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email , 'password' => $password ];
        if(Auth::attempt($credentials))
        {
            $profile = Auth::user();
            $request->session()->regenerate(true); 
            return to_route('dashboard')->with('success', 'Vous êtes bien connecté '.$email." .");

        }else{
            // shi haja ghalta
            return back()->withErrors([
            'email'=> 'Email ou mot de passe incorrect.'
            ])->onlyInput('email');
        }
    }

    public function logout()
    {
        Auth::logout(); 

        return redirect()->route('login'); 
        // return view('login');

    }

}
