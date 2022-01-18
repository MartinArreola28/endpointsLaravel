<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'public_id', 
        'name'
    ];
    protected $dates = [ 'deleted_at' ];

    //relacion uno a muchos to user
    public function users(){
        return $this->hasMany(User::class);
    }

    //relacion uno a muchos to curse
    public function curses(){
        return $this->hasMany(Curse::class);
    }
}
