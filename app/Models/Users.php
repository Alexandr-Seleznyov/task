<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id',
        'email',
        'password',
    ];


    public function note()
    {
        return $this->hasMany('App\Models\Note', 'users_id');
    }

}
