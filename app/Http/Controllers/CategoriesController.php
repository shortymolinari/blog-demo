<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function show(Category $category){
		//return $category->load('posts');
    	$title = "Publicaciones de la categoría '{$category->name}'";
		$posts = $category->posts()->published()->paginate(1);

		if(request()->wantsJson()){
			return $posts;
		}

    	return view('pages.home', compact('posts', 'title'));

    	// return view('welcome',[
    	// 	'posts' => $category->posts()->paginate(6)
    	// ]);
    }
}
