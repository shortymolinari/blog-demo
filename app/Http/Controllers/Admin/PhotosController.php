<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotosController extends Controller
{
    public function store(Request $request, Post $post){

    	$this->validate($request, [
    		'photo' => 'required|image|max:2048'
    	]);

        $post->photos()->create([
            'url' => $request->file('photo')->store('posts', 'public')
        ]);

    	//$photo = $request->file('photo')->store('public');
    	//$photoUrl =  Storage::url($photo);
    	// Photo::create([
    	// 	'url' => $request->file('photo')->store('posts', 'public'),
    	// 	'post_id' => $post->id
    	// ]);
    }

    public function destroy(Photo $photo){
        $photo->delete();
        //$photoPath = str_replace('storage', 'public', $photo->url);
        //Storage::disk('public')->delete($photo->url);

        return back()->with('flash', 'Foto eliminada');
    }
}
