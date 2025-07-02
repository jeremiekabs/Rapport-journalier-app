<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['nom', 'description', 'partenaire_id'];

    public function partenaire(){
        return $this->belongsTo(Partenaire::class, 'partenaire_id');
    }
}
