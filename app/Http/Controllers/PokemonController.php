<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\Treinador;
use Dompdf\Dompdf;
use Illuminate\Http\Request;


class PokemonController extends Controller
{
    public function index(Request $request)
{
    $query = Pokemon::orderBy('tipo')
        ->orderBy('nivel')
        ->with('treinador');

    if ($request->has('sem_treinador')) {
        $query->whereNull('treinador_id');
    }

    if ($request->filled('nome')) {
        $query->where('nome', 'like', '%' . $request->nome . '%');
    }

    if ($request->filled('tipo')) {
        $query->where('tipo', $request->tipo);
    }

    if ($request->filled('nivel_minimo')) {
        $query->where('nivel', '>=', $request->nivel_minimo);
    }

    if ($request->filled('treinador_id')) {
        $treinadorId = $request->treinador_id;
        if ($treinadorId === 'null') { // verifica se o valor é "null"
            $query->whereNull('treinador_id');
        } else {
            $query->where('treinador_id', $treinadorId);
        }
    }

    $pokemons = $query->paginate(5);

    $treinadores = Treinador::all();
    $tipos = ['Água', 'Fogo', 'Grama', 'Elétrico', 'Pedra', 'Vooador', 'Psíquico', 'Venenoso', 'Fada'];

    return view('pokemons.index', compact('pokemons', 'treinadores', 'tipos'))
        ->with('filters', $request->only('nome', 'tipo', 'nivel_minimo', 'treinador_id'));
}

public function create()
{
    $treinadores = Treinador::all();
    $tipos = ['Água', 'Fogo', 'Grama', 'Elétrico', 'Pedra', 'Vooador', 'Psíquico', 'Venenoso', 'Fada'];
    return view('pokemons.create', compact('treinadores', 'tipos'));
}
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nivel' => 'required|integer|min:1|max:4', 
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'treinador_id' => 'nullable|exists:treinadores,id',
            'tipo' => 'required',
        ]);

        $pokemon = new Pokemon();
        $pokemon->nome = $request->nome;
        $pokemon->nivel = $request->nivel;
        $pokemon->tipo = $request->tipo;

        if ($request->has('treinador_id')) {
            $pokemon->treinador_id = $request->treinador_id;
        }

        // Salvar a imagem se ela for enviada
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $pokemon->foto = $name;
        }

        $pokemon->save();

        return redirect()->route('pokemons.index')
            ->with('success', 'Pokémon cadastrado com sucesso!');
    }

    public function show($id)
    {
        $pokemon = Pokemon::with('treinador')->find($id);
        return view('pokemons.show', compact('pokemon'));
    }

    public function edit($id)
    {
        $pokemon = Pokemon::with('treinador')->find($id);
        $treinadores = Treinador::all();
        $tipos = ['Água', 'Fogo', 'Grama', 'Elétrico', 'Pedra', 'Vooador', 'Psíquico', 'Venenoso', 'Fada'];
        return view('pokemons.edit', compact('pokemon', 'treinadores', 'tipos'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'nivel' => 'required|integer|min:1|max:100', 
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'treinador_id' => 'nullable|exists:treinadores,id',
        'tipo' => 'required',
    ]);

    $pokemon = Pokemon::find($id);
    $pokemon->nome = $request->nome;
    $pokemon->nivel = $request->nivel;
    $pokemon->tipo = $request->tipo;

    if ($request->has('treinador_id')) {
        $pokemon->treinador_id = $request->treinador_id;
    } else {
        $pokemon->treinador_id = null;
    }

    // Salvar a nova imagem se ela for enviada
    if ($request->hasFile('foto')) {
        $oldImagePath = public_path('/images/') . $pokemon->foto;
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }
        $image = $request->file('foto');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);
        $pokemon->foto = $name;
    }

    $pokemon->save();

    return redirect()->route('pokemons.index')->with('success', 'Pokémon atualizado com sucesso!');
}
    

    public function destroy($id)
    {
        $pokemon = Pokemon::find($id);

        // Excluir a imagem se ela existir
        if (!empty($pokemon->foto)) {
            $imagePath = public_path('/images/') . $pokemon->foto;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $pokemon->delete();
    
        return redirect()->route('pokemons.index')
            ->with('success', 'Pokémon excluído com sucesso!');
    }

    public function desvincular($id)
    {   
        $pokemon = Pokemon::findOrfail($id);
        $pokemon->treinador_id=null;
        $pokemon->save();

        return back()
        ->with('success', 'Pokémon removido com sucesso!');
    }

    public function generatePdf(Request $request)
    {
        $query = Pokemon::orderBy('tipo')
            ->orderBy('nivel')
            ->with('treinador');
    
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }
    
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
    
        if ($request->filled('nivel_minimo')) {
            $query->where('nivel', '>=', $request->nivel_minimo);
        }
    
        if ($request->filled('treinador_id')) {
            $treinadorId = $request->treinador_id;
            if ($treinadorId === 'null') { // verifica se o valor é "null"
                $query->whereNull('treinador_id');
            } else {
                $query->where('treinador_id', $treinadorId);
            }
        }
    
        $pokemons = $query->paginate(80)->appends($request->query());
    
        $html = view('pokemons.pdf', compact('pokemons'))->render();
    
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
    
        return $dompdf->stream('listagem-pokemon.pdf');
    }
    
}
