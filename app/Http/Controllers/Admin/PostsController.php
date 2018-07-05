<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index(){
    	//$posts = Post::all();
        //$posts = Post::where('user_id', auth()->id())->get();
        //$posts = auth()->user()->posts;

        // if( auth()->user()->hasRole('Admin') ){
        //     $posts = Post::all();//todo los posts
        // }
        // else{
        //     $posts = auth()->user()->posts;// post del usurio autenticado
        // }

        $posts = Post::allowed()->get();
        
    	return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request){

        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);
       
        //$post = Post::create( $request->only('title') );
        // $post = Post::create([
        //     'title' => $request->get('title'),
        //     'user_id' => auth()->id()
        // ]);
        $post = Post::create($request->all());
        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post){

        $this->authorize('update', $post);

        // $categories = Category::all();
        // $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(), 
            'categories' => Category::all()  
        ]);
    }

    public function update(Post $post, StorePostRequest $request){

        $this->authorize('update', $post);

        // $post->title = $request->get('title');
        // $post->iframe = $request->get('iframe');
        // $post->body = $request->get('body');
        // $post->excerpt = $request->get('excerpt');
        // $post->published_at = $request->get('published_at');
        // $post->category_id = $request->get('category_id');
        //$post->save();

        $post->update($request->all());
        $post->synTags($request->get('tags'));

        //Etiquetas 
        // 1=> $post->tags()->attach($request->get('tags'));//crear 
        /* 2=> $tags = [];
        foreach ($request->get('tags') as $tag) {
            $tags[] = Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        }*/

        /*$tags = collect($request->get('tags'))->map(function($tag){ 
        //dentro de la funcion vamos recibiendo las etiquetas una a la vez (en el parametro)
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        $post->tags()->sync($tags); //actualizar etiquetas*/

        return redirect()
            ->route('admin.posts.edit', $post)
            ->with('flash', 'La publicación ha sido guardada');
    }

    public function destroy(Post $post){
        //$post->tags()->detach(); //quitar todas las etiquetas asignadas al pots

        //ELIMINAR LAS FOTOS
        /*1*/
            /*foreach ($post->photos as $photo){
                $photo->delete();
            }*/

        /*2*/
            /*$post->photos->each(function($photo){
                $photo->delete();
            });*/

        /*3*/
            /*$post->photos->each->delete();*/

        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
            ->route('admin.posts.index')
            ->with('flash', 'La publicación ha sido eliminada');
    }
}
