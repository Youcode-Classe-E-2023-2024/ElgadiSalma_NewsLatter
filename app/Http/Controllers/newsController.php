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

    public function addTemplate()
    {
        
    }
}
