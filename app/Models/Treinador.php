<?php

// Modelo para a entidade "Treinador"
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
    protected $table = 'treinadores';
    protected $fillable = ['nome', 'cidade', 'foto'];

    public function pokemons()
    {
        return $this->hasMany(Pokemon::class);
    }
}

