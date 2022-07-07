<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{

    public $timestamps= false;

    protected $fillable = [
        'username_utente', 'id_match' , 'commento', 'data'
    ];

    protected function user() {
        return $this->belongsTo('App/Models/Comment');
    }

}

?>