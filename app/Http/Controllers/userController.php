<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;

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

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect()->route('login.show'); 
    }


    // forgot pass

    public function forgot_show()
    {
        return view('forgot-password');
    }
    public function reset($token)
    {
        $user = User::where('remember_token', $token)->first();
    
        if (!empty($user)) {
            $data['user'] = $user;
            $data['token'] = $token; // Pass the token to the view
            return view('reset-password', $data);
        } else {
            abort(404);
        }
    }

    public function forgot_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        if(!empty($user))
        {
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            
            return back()->withErrors([
                'email'=> 'Check ton email'
                ])->onlyInput('email');
        }else{
            return back()->withErrors([
                'email'=> 'Email non trouvé.'
                ])->onlyInput('email');
        }
    }

    public function post_reset($token, Request $request)
    {
        $user = User::where('remember_token','=',$token)->first();
        if(!empty($user))
        {
            if($request->password == $request->confirm_password)
            {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(40);
                $user->save();

                return redirect()->route('login.show'); 

            }else{
                return redirect()->back()->with('error', 'Mots de passe non identiques');
            }
        }else{
            abort(404);
        }
    }

    

}


