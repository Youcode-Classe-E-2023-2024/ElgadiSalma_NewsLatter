<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 



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
                    Rule::unique('subscribers', 'email'),
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

    public function showSubscriberStatistics()
    {
        $subscriberStatistics = Subscriber::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as subscriber_count')
        )
        ->groupBy('date')
        ->get();

        // Nombre total d'abonnés
        $totalSubscribers = Subscriber::count();

        return view('dashboard', [
            'subscriberStatistics' => $subscriberStatistics,
            'totalSubscribers' => $totalSubscribers
        ]);
    }

    public function showSubscriberList()
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->get();
        return view('subscribers', ['subscribers' => $subscribers]);
    }

    public function deleteSubscriber($id)
    {
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect()->route('list.subscribers')->with('success', 'Supprimé avec succès');
    }


}

