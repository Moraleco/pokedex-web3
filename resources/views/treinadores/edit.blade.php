@extends('template')

@section('content')
    <h1 class="text-center my-4">Editar Treinador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('treinadores.update', $treinador->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $treinador->nome }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" id="cidade" name="cidade" value="{{ $treinador->cidade }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pokemon" class="form-label">Adicionar Um Pokémon:</label>
            <select id="pokemon" name="pokemon_id" class="form-control">
                <option value="">Selecione um Pokémon</option>
                @foreach($pokemonsSemTreinador as $pokemon)
                    <option value="{{ $pokemon->id }}">{{ $pokemon->nome }}</option>
                @endforeach
            </select>
        </div>
                  
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mx-4">Atualizar</button>
            <a href="{{ route('treinadores.index') }}" class="btn btn-secondary mx-4">Voltar</a>
        </div>       
    </form>

    <div class="row">
        <label for="pokemon" class="form-label">Seus Pokémons:</label>
        @foreach ($treinador->pokemons as $pokemon)
          <div class="col-md-4 mb-4 ">
            <div class="card text-center ">
              <img src="{{ asset('images/' . $pokemon->foto) }}" alt="{{ $pokemon->nome }}" class="card-img-top mx-auto" style="width: 100px; height: 100px;">
              <div class="card-body">
                <h5 class="card-title">{{ $pokemon->nome }}</h5>
                <p class="card-text">{{ $pokemon->descricao }}</p>
                <form action="{{ route('pokemon.desvincular', $pokemon->id) }}" method="POST"
                    style="display: inline-block;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Tem certeza que deseja desvincular este Pokémon?')">Desvincular</button>
                </form>
              </div>
            </div>
          </div>
        @endforeach
    </div>
@endsection
