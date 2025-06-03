<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerts_stock extends Model
{
    protected $fillable = ['produit_id', 'is_alert'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
