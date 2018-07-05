<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post){

   		//$post = Post::find($id);

       // return new PostResource($post);

   		if($post->isPublished() || auth()->check()){
   			
   			if(request()->wantsJson()){
                $post->load('owner', 'category', 'tags', 'photos');
   				return $post;
   			}
            
			return view('posts.show', compact('post'));
   		}

   		abort(404);
    }
}
