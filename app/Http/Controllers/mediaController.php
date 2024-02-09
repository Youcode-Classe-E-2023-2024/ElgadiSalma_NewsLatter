<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class mediaController extends Controller
{
    public function showMedia()
    {
        $medias = Media::orderBy('created_at', 'desc')->get();
        return view('media', ['medias' => $medias]);
    }


}
