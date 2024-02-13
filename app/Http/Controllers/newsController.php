<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medias;
use App\Models\News;


class newsController extends Controller
{
    public function templates()
    {
        return view('templates');

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

        return redirect()->route('addTemplate.show')->with('success', 'Image bien ajoutée.');
    }
}
