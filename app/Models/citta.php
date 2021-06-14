<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class citta extends Model {
    
    protected $table = "CITTA";

    protected $fillable = [
        'regione', 'codice_citta', 'numero_clienti'
    ];

    public function User() {
        return $this->belongsTo("App\Models\User");
    }

}

?> 