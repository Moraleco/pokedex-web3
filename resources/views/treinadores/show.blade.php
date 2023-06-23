@extends('template')

@section('content')
    <h1 class="text-center my-4">Detalhes do Treinador</h1>

    <div class="card">
        <div class="card-body">
            <div class="mb-3 text-center">
                <img src="{{ asset('images/' . $treinador->foto) }}" alt="{{ $treinador->nome }}" class="rounded img-thumbnail"
                    style="width: 200px; height: 200px;">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label"><strong>Nome:</strong></label>
                <span>{{ $treinador->nome }}</span>
            </div>
            <div class="mb-3">
                <label for="cidade" class="form-label"><strong>Cidade:</strong></label>
                <span>{{ $treinador->cidade }}</span>
            </div>
            <div class="mb3">
                <label for="pokemon" class="form-label"><strong>Pokemons:</strong></label>
                @if ($treinador->pokemons->isEmpty())
                    Sem Pokémons
                @else
                    <ul>
                        @foreach ($treinador->pokemons as $pokemon)
                            <li>{{ $pokemon->nome }} - Nível: {{ $pokemon->nivel }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="row">
                <label for="pokemon" class="form-label">Seus Pokémons:</label>
                @foreach ($treinador->pokemons as $pokemon)
                  <div class="col-md-4 mb-4 ">
                    <div class="card text-center ">
                      <img src="{{ asset('images/' . $pokemon->foto) }}" alt="{{ $pokemon->nome }}" class="card-img-top mx-auto" style="width: 100px; height: 100px;">
                      <div class="card-body">
                        <h5 class="card-title">{{ $pokemon->nome }}</h5>
                        <p class="card-text">{{ $pokemon->descricao }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div> 
        </div>
    </div>

    <a href="{{ route('treinadores.index') }}" class="btn btn-primary mt-3">Voltar</a>
@endsection
