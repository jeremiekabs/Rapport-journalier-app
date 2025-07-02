<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Alerts_stock;

class Produit extends Model
{
    protected $fillable = [
        "nom",
        "description",
        "prix_achat",
        "indice",
        "prix",
        "gain",
        "stock",
        "categorie_id",
        "photo"
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function vendre($quantite)
    {
        if ($this->stock >= $quantite) {
            $this->stock -= $quantite;
            $this->save();

            // Vérifier si le stock est à 0 et envoyer une alerte
            if ($this->stock == 0) {
                // On peut stocker l'alerte en base ou envoyer une notification
                session()->flash('alerte_stock', "🚨 Le produit {$this->nom} est en rupture de stock !");
            }

            return true;
        }
        return false;
    }

    public function verifierStock()
    {
        if ($this->stock <= 0) {
            Alerts_stock::updateOrCreate(
                ['produit_id' => $this->id],
                ['is_alert' => true]
            );
        }
    }
}
