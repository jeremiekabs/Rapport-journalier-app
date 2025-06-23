<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['nom', 'description', 'partenaire_id'];

    public function services(){
        return $this->belongsTo(Service::class, 'partenaire_id');
    }
}
