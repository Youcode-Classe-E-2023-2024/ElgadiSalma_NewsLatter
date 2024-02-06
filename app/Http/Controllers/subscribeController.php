<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;


class subscribeController extends Controller
{

    public function add_subscribe(Request $request)
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

        return view('subscribe');
    }

}
