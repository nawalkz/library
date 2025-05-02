<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'auteur_id',
        'categorie_id',
        'nombre_inventaire',
        'editeur_id',
        'image',
        'nombre_page',
        'edition',
        'isbn',
        'statut',
        
    ];
    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function editeur()
    {
        return $this->belongsTo(Editeur::class);
    }

    public function emprunt()
    {
        return $this->hasMany(Emprunt::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
}

