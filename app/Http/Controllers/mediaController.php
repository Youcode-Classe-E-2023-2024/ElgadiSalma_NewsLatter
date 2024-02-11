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

    public function addMedia(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|max:20480',
        ]);
    
        $photo = $request->file('photo');
    
        if ($photo->isValid() && strpos($photo->getMimeType(), 'image') !== false) {
            $imageName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $imageExtension = $photo->getClientOriginalExtension();
            $imageFullName = $imageName . '_' . time() . '.' . $imageExtension;
    
            $photo->move(public_path('storage/media/images'), $imageFullName);
    
            Media::create([
                'type' => 'image',
                'photo' => $imageFullName,
            ]);
    
            return redirect()->route('media.show')->with('success', 'Image bien ajoutée.');
        }

        elseif ($photo->isValid() && strpos($photo->getMimeType(), 'video') !== false) {
            $videoName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $videoExtension = $photo->getClientOriginalExtension();
            $videoFullName = $videoName . '_' . time() . '.' . $videoExtension;
    
            $photo->move(public_path('storage/media/videos'), $videoFullName);
    
            Media::create([
                'type' => 'video',
                'photo' => $videoFullName,
            ]);
    
            return redirect()->route('media.show')->with('success', 'Vidéo bien ajoutée.');
        } else {
            return redirect()->route('media.show')->with('error', 'Format de fichier non pris en charge.');
        }
    }

    public function deleteMedia($id)
    {
        $media = Media::find($id);
        $media->delete();
        return redirect()->route('media.show')->with('success', 'Supprimé avec succès');
    }

}
