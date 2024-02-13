<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medias;
use Illuminate\Support\Facades\Auth; 


class mediaController extends Controller
{
    public function showMedia()
    {
        $medias = Medias::orderBy('created_at', 'desc')->get();
        return view('media', ['medias' => $medias]);
    }

    public function addMedia(Request $request)

    {
       $userId = Auth::id();

       $media = Medias::create([
           "created_by" => $userId,

       ]);

       // Iterate over each uploaded file and add it to the media collection
       foreach ($request->file('files') as $file) {
           $storedFile = $file->store('uploads');

           // Add the stored file to the media collection
           $media->addMedia(storage_path('app/' . $storedFile))->toMediaCollection();
       }
        // Handle success scenario
        return redirect()->route('media.show')->with('success', 'Image bien ajoutée.');
    }

    public function deleteMedia($id)
    {
        $media = Medias::find($id);
        $media->delete();
        return redirect()->route('media.show')->with('success', 'Supprimé avec succès');
    }

}
