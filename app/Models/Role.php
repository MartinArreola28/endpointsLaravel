<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'public_id', 
        'name'
    ];
    protected $dates = [ 'deleted_at' ];

    //Relacion muchos a uno
    public function users(){
        return $this->hasMany(User::class);
    }
}
