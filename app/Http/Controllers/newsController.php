<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsController extends Controller
{
    public function templates()
    {
        return view('templates');

    }

    public function addTemplate_show()
    {
        return view('addTemplate');
    }
}
