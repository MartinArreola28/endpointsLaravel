<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Phone extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'public_id', 
        'user_id',
        'number',
    ];
    protected $dates = [ 'deleted_at' ];

    //Relacion uno a muchos inversa to User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
