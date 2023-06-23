@extends('template')

@section('content')
    <h1 class="text-center my-4">Detalhes do Pokémon</h1>

    <div class="card">
        @if ($pokemon->foto)
            <img src="{{ asset('images/' . $pokemon->foto) }}" alt="{{ $pokemon->nome }}"
                class="card-img-top img-fluid" style="width: 50%">
        @endif
        <div class="card-body">
            <p class="card-text"><strong>ID:</strong> {{ $pokemon->id }}</p>
            <p class="card-text"><strong>Nome:</strong> {{ $pokemon->nome }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $pokemon->tipo }}</p>
            <p class="card-text"><strong>Nível:</strong> {{ $pokemon->nivel }}</p>
            <p class="card-text"><strong>Treinador:</strong>
                @if ($pokemon->treinador)
                    {{ $pokemon->treinador->nome }}
                @else
                    Sem treinador
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('pokemons.index') }}" class="btn btn-primary mt-3">Voltar</a>
@endsection
