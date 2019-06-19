<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $fillable = [
        'id',
        'users_id',
        'title',
        'description',
    ];


    public function users()
    {
        return $this->belongsTo('App\Models\Users', 'users_id')->withDefault();
    }

}
