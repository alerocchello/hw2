<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    // Campi diversi da questi non verranno inseriti nel database. Serve ad evitare che un utente possa aggiornare campi che 
    // non dovrebbe, es: id
    protected $fillable = [
        'name', 'surname', 'username', 'email', 'password'
    ];

    // Spiegazione stackoferflow: 
    // Per impostazione predefinita, laravel si aspetterà la colonna create_at e update_at nella mia tabella. 
    // Impostando timestamps su false, sovrascriverà l'impostazione predefinita.
    public $timestamps = false;

    protected function products() {
        return $this->belongsToMany('App/Models/Tshirt');
    }

    protected function comments() {
        return $this->hasMany('App/Models/Comment');
    }

}

?>