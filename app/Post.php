<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','iframe', 'body', 'excerpt', 'published_at', 'category_id', 'user_id'];
    
    protected $dates = ['published_at'];
    //protected $guarded = [];

    protected $appends = ['published_date'];

    //Precargar las relaciones del modelo (Siempre)
    //protected $with = ['category', 'tags', 'owner', 'photos'];

    protected static function boot(){

        parent::boot();

        /*estamos escuchando, que cuándo se elimine un post
        queremos que se elimine las fotos y tags relacionados a este*/

        static::deleting(function($post){
            $post->tags()->detach();
            $post->photos->each->delete();
        });
    }

    //Model Binding
    public function getRouteKeyname(){
        return 'url';
    }

    //Accesores
    public function getPublishedDateAttribute(){
        return optional($this->published_at)->format('M d');
    }

    //Mutadores
    // public function setTitleAttribute($title){

    //     $this->attributes['title'] = $title;

    //     $url = str_slug($title);
    //     $duplicateUrlCount = Post::where('url', 'LIKE', "{$url}%")->count();
    //     if($duplicateUrlCount){
    //         $url .= "-" . ++$duplicateUrlCount;
    //     }
    //     $this->attributes['url'] = $url;
    // }

    public function setPublishedAtAttribute($published_at){
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category){
        $this->attributes['category_id'] = Category::find($category)
                                ? $category
                                : Category::create(['name' => $category])->id;
    }

    //Relaciones
    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tag::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //Scopes
    public function scopePublished($query){
    	$query->with(['category', 'tags', 'owner', 'photos'])
            ->whereNotNull('published_at')
        	->where('published_at', '<=', Carbon::now())
        	->latest('published_at');
    }

    // public function scopeAllowed($query){

    //     if( auth()->user()->hasRole('Admin') ){
    //         $posts = $query;//todo los posts
    //     }
    //     else{
    //         $posts = $query->where('user_id', auth()->id());// post del usurio autenticado
    //     }
    // }

    public function scopeAllowed($query){

        if( auth()->user()->can('view', $this) ){
            $posts = $query;//todo los posts
        }
        else{
            $posts = $query->where('user_id', auth()->id());// post del usurio autenticado
        }
    }

    public function scopeByYearAndMonth($query){

        return $query->selectRaw('year(published_at) as year')
                ->selectRaw('monthname(published_at) as monthname')
                ->selectRaw('month(published_at) as month')
                ->selectRaw('count(*) as posts')
                ->groupBy('year', 'monthname', 'month')
                ->orderBy('published_at');
    }

    //FUNCIONES
    public function isPublished(){
        //return (bool) $this->published_at;
        //si no es null y es menor a la fecha actual
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    //Sobre escribeindo el metodo create
    public static function create(array $attributes = []){

        $attributes['user_id'] = auth()->id();
        $post = static::query()->create($attributes);
        $post->generateUrl();
        return $post;
    }

    public function generateUrl(){
        $url = str_slug($this->title);

        if($this->whereUrl($url)->exists()){
            $url = "{$url}-{$this->id}";
        }

        $this->url = $url;
        $this->save();
    }

    public function synTags($tags){
        $tagIds = collect($tags)->map(function($tag){ 
        //dentro de la funcion vamos recibiendo las etiquetas una a la vez (en el parametro)
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

       return $this->tags()->sync($tagIds); //actualizar etiquetas
    }

    public function viewType($home = ''){
        if($this->photos->count() === 1):
            return 'posts.photo';
        elseif($this->photos->count() > 1):
            return $home === 'home' ? 'posts.carousel-preview' : 'posts.carousel';
        elseif($this->iframe):
            return 'posts.iframe';
        else:
            return 'posts.text';
        endif;
    }
}