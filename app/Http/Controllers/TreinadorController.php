<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\Treinador;

class TreinadorController extends Controller
{
    public function index()
    {
        $treinadores = Treinador::orderBy('id')->paginate(10);
        return view('treinadores.index', compact('treinadores'));
    }

    public function create()
    {
        return view('treinadores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cidade' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoNome = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('images'), $fotoNome);

        Treinador::create([
            'nome' => $request->nome,
            'cidade' => $request->cidade,
            'foto' => $fotoNome,
        ]);

        return redirect()->route('treinadores.index')
            ->with('success', 'Treinador cadastrado com sucesso!');
    }

    public function show($id)
    {
        $treinador = Treinador::find($id);
        return view('treinadores.show', compact('treinador'));
    }

    public function edit($id)
    {
        $treinador = Treinador::find($id);
        $pokemonsSemTreinador = Pokemon::whereNull('treinador_id')->get();
        return view('treinadores.edit', compact('treinador', 'pokemonsSemTreinador'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cidade' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $treinador = Treinador::find($id);
    
        if ($request->hasFile('foto')) {
            if ($treinador->foto && file_exists(public_path('images/' . $treinador->foto))) {
                unlink(public_path('images/' . $treinador->foto));
            }
    
            $fotoNome = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $fotoNome);
    
            $treinador->update([
                'nome' => $request->nome,
                'cidade' => $request->cidade,
                'foto' => $fotoNome,
            ]);
        } else {
            $treinador->update([
                'nome' => $request->nome,
                'cidade' => $request->cidade,
            ]);
        }
    
        // adiciona o ID do treinador ao Pokémon selecionado
        $pokemon_id = $request->input('pokemon_id');
        if ($pokemon_id) {
            $pokemon = Pokemon::find($pokemon_id);
            $pokemon->treinador_id = $treinador->id;
            $pokemon->save();
        }
    
        return redirect()->route('treinadores.index')
            ->with('success', 'Treinador atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        $treinador = Treinador::findOrFail($id);

        if ($treinador->pokemons()->count() > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir um treinador que possui pokémons.');
        }

        if ($treinador->foto && file_exists(public_path('images/' . $treinador->foto))) {
            unlink(public_path('images/' . $treinador->foto));
        }

        $treinador->delete();

        return redirect()->route('treinadores.index')
            ->with('success', 'Treinador excluído com sucesso!');
    }
}
