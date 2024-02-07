<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;


class subscribeController extends Controller
{
    public function subscribeShow()
    {
        return view('subscribe');
    }

    public function subscribe(Request $request)
    {
        try {
            $request->validate([
                'email' => [
                    'required',
                    'email',
                    Rule::unique('subsribers', 'email'),
                ],             
            ]);
        } catch (ValidationException $e) {
            // Validation échouée
            return back()->withErrors($e->errors())->onlyInput('email');
        }

        Subscriber::create([
            'email' => $request->input('email'),
        ]);

        return back()->with('success', 'Vous avez été abonné avec succès.');
    }

    public function unsubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        $subscriber = Subscriber::where('email', $email)->first();

        if (!$subscriber) {
            return back()->withErrors([
                'email'=> 'Email non trouvé.'
                ])->onlyInput('email');        }

        $subscriber->update(['status' => 1]);

        return back()->with('success', 'Vous avez été désabonné avec succès.');
    }
}
