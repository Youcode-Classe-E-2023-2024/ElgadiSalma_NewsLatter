<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medias;
use App\Models\News;


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

}
