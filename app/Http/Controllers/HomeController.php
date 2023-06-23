<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Treinador;

class HomeController extends Controller
{
    public function index()
    {
        $pokemons=Pokemon::orderBy('nome','asc')->get();
        $treinadores=Treinador::orderBy('nome','asc')->get();







        return view('welcome',compact('pokemons','treinadores'));

    }
}
