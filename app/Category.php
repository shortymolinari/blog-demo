<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $dates = ['published_at'];
    protected $guarded = [];

    //Model Binding
    //Cambiar valor por defecto que retorma laravel (por defecto id)
    public function getRouteKeyName(){ 
    	return 'url';
    }

    //Accesores (get + Nombre de campo en BD + Attribute)
    /* public function getNameAttribute($name){ 
        return str_slug($name);
    }*/

    //Mutadores (+ Nombre de campo en BD + Attribute) 
    //Setear o definir la propiedad, se ejecuta antes  de guardar o actualizar un modelo
    public function setNameAttribute($name){

        $this->attributes['name'] = $name;
        $this->attributes['url'] = str_slug($name);
    }
    
    //Relaciones
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
