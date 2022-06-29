<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = [
        'username_utente', 'id_prodotto'
    ];

    public $timestamps = false;
}

?>