<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'school_id',
        'role_id',
        'public_id', 
        'name',
        'last_name'
    ];
    protected $dates = [ 'deleted_at' ];

    //Relacion uno a muchos inversa to School
    public function school(){
        return $this->belongsTo(School::class);
    }

    //Relacion uno a muchos inversa to Role
    public function role(){
        return $this->belongsTo(Role::class);
    }

    //Relacion uno a muchos to Phone
    public function phones(){
        return $this->hasMany(Phone::class);
    }
    
    //funcion para relacionar la tabla user con curse = users_curse
    public function curses(){
        return $this->belongsToMany(Curse::class, 'users_curses')->withTimestamps();
    }
    
}
