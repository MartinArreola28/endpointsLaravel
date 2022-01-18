<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curse extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'public_id', 
        'name',
        'school_id'
    ];
    protected $dates = [ 'deleted_at' ];

    //relacion uno a muchos inserva to school
    public function school(){
        return $this->belongsTo(School::class);
    }

    //funcion para relacionar la tabla user con curse = users_curse
    public function users(){
        return $this->belongsToMany(User::class, 'users_curses')->withTimestamps();
    }
}
