<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    protected $fillable = ['nome', 'nivel', 'foto', 'tipo'];

    public function treinador()
    {
        return $this->belongsTo(Treinador::class);
    }

    public static function getTipos()
    {
        return ['Água', 'Fogo', 'Grama', 'Elétrico', 'Pedra','Vooador', 'Psíquico', 'Venenoso', 'Fada'];
    }

    public static function getByTipo($tipo)
    {
        return Pokemon::where('tipo', $tipo)->get();
    }
}
