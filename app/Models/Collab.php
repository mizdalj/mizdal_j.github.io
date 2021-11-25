<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enterprise;

class Collab extends Model
{
    use HasFactory;
    protected $fillable = [
        'civilite',
        'nom',
        'prenom',
        'adresse',
        'codePostal',
        'ville',
        'numeroDeTelephone',
        'email',
        'enterprise_id'
    ];
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'enterprise_id', 'id');
    }
}
