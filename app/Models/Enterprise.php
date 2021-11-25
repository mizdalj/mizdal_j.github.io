<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'adresse',
        'codePostal',
        'ville',
        'numeroDeTelephone',
        'email'
    ];
    public function collaborateur(){
        return $this->hasMany(Collabs::class);
    }
}
