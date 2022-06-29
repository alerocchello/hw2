<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

    protected $fillable = [
        'titolo', 'dettagli', 'url_copertina'
    ];

    public $timestamps = false;

}

?>