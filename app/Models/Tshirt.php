<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model {

    protected $fillable = [
        'team', 'url_copertina', 'prezzo'
    ];

    public $timestamps = false;


}

?>