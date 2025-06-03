<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
     protected $fillable = [
        "date_enr",
        "heure_entree",
        "heure_sortie",
        "nom",
        "prenom",
        "qualite_personne",
        "entreprise",
        "particulier",
        "telephone",
        "email",
        "raison_visite",
        "produit_service_demande",
        "vente_directe",
        "visite_site",
        "vente",
        "commentaires",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getEnumValues()
    {
        return ['NA', 'OUI', 'NON'];
    }
    
}
