<?php

namespace App\Http\Controllers;

use App\Mail\NewsLetter;
use Illuminate\Http\Request;
use App\Models\Medias;
use App\Models\News;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;



class newsController extends Controller
{
    public function templates()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('templates', ['news' => $news]);
    }

    public function addTemplate_show()
    {
        $medias = Medias::orderBy('created_at', 'desc')->get();        
        return view('addTemplate', ['medias' => $medias]);
    }

    public function addTemplate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'media' => 'required',
            'description' => 'required',
        ]);

        News::create([
            'title' => $request->input('title'),
            'media' => $request->input('media'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('templates')->with('success', 'Image bien ajoutée.');
    }

    public function editTemplate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = News::findOrFail($id);

        $news->title = $request->input('title');
        $news->description = $request->input('description');
        
        $news->save();

        return redirect()->route('templates')->with('success', 'Image bien ajoutée.');
    }

    public function deleteTemplate($id)
    {
        $new = News::find($id);
        $new->delete();
        return redirect()->route('templates')->with('success', 'Image bien ajoutée.');
    } 

    public function showDeletedTemplates()
    {
        $news = News::orderBy('created_at', 'desc')->get();

        $deletedNews = News::onlyTrashed()->get();

        return view('adminTemplates', compact('deletedNews', 'news'));
    }
    public function restoreTemplate($id)
    {
        $news = News::withTrashed()->find($id);
        $news->restore();
        return redirect()->back()->with('success', 'template restored successfully!');
    }

    public function sendTemplate($id)
    {
        $template = News::find($id);

        // Récupérez la liste des abonnés
        $subscribers = Subscriber::all();
    
        // Envoie de l'e-mail à chaque abonné
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsLetter($template));
        }
    
        return redirect()->back()->with('success', 'La newsletter a été envoyée à tous les abonnés.');
    }

}
