<?php

namespace app\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    // use HasFactory, Notifiable;

    protected $table = "dati_login";

    protected $fillable = [
        'username', 'password', 'codice', 'citta', 'id_conto'
    ];

    protected $hidden = [
        'password', 'id_session'
    ];
    
    public function cliente() {
        return $this->hasOne("App\Models\cliente");
    }

    public function citta() {
        return $this->hasOne('App\Models\citta');
    }

    public function conto() {
        return $this->hasOne('App\Models\conto');
    }
}

?>