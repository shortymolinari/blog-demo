<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Mutadores
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    //Relaciones
    public function posts(){
        return $this->hasMany(Post::class);
    }

    //Escopes
    public function scopeAllowed($query){

        if( auth()->user()->can('view', $this) ){
           return $query;
        }
        else{
            return $query->where('id', auth()->id());
        }
    }

    public function getRoleDisplayNames(){
        return $this->roles->pluck('display_name')->implode(', ');
    }
}
