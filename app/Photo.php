<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];


    protected static function boot(){

    	parent::boot();

    	/*estamos escuchando, que cuándo se elimine una foto
    	queremos que se elimine a la que hace referencia en el almacenamiento*/
    	static::deleting(function($photo){
    		Storage::disk('public')->delete($photo->url);
    	});
    }
}
