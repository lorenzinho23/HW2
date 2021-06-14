<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model {
    
    protected $table = "CLIENTE";

    protected $fillable = [
        'codice', 'eta', 'data_di_nascita', 'citta', 'id_conto'
    ];

    public function User() {
        return $this->belongsTo("App\Models\User");
    }

}

?> 