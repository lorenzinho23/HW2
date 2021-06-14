<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class conto extends Model {
    
    protected $table = "CONTO";

    protected $fillable = [
        'id', 'saldo'
    ];

    protected $casts = [
        'data_scadenza' => 'date'
    ];

    public function User() {
        return $this->belongsTo("App\Models\User");
    }

}

?> 