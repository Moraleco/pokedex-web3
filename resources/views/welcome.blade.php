@extends('template')

@section('content')

@php
    require_once(app_path().'/helpers.php');
@endphp

<h1 class="text-center my-4">Trabalho de Web 3 - Gabriel Moraleco</h1>
<h1>POKEMONS</h1><br>
    <div id="carouselExample" class="carousel slide carrossel" data-bs-ride="carousel">
      <div class="carousel-inner">
        @foreach($pokemons->chunk(8) as $key => $pokemonGroup)
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <div class="row">
              @foreach($pokemonGroup as $pokemon)
                <div class="col-lg-3 mb-4 test">
                  <a href="{{route('pokemons.show',$pokemon->id)}}" class="d-inline-flex a-poke">
                    <div class="card card-poke">
                      <div class="card-body">
                        <div class="d-flex flex-column justify-content-center align-items-left">
                          <div class="">
                            <img class="type-icon" src="/icons/{{ strtolower($pokemon->tipo) }}.png" alt="{{ $pokemon->tipo }}" />
                          </div>
                          <img src="{{ asset('images/' . $pokemon->foto) }}" alt="{{ $pokemon->nome }}" class="card-img-top mx-auto mb-3 img-poke {{ getCardClass($pokemon->tipo) }}">
                          <div><p class="pokemon-text">Nome: {{ $pokemon->nome }}</p></div>
                          <div><p class="pokemon-text">Tipo: {{ $pokemon->tipo }}</p></div>
                          <div><p class="pokemon-text">Nível: {{ $pokemon->nivel }}</p></div>
                          <div><p class="pokemon-text">Treinador: {{ $pokemon->treinador ? $pokemon->treinador->nome : 'Sem treinador' }}</p></div>
                        </div> 
                      </div>
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
<h1>TREINADORES</h1>
<div class="container">
    <div class="row mt-5">
        @foreach($treinadores as $treinador)
                <div class="col-lg-2 mb-4 test">
                    <a href="{{route('treinadores.show',$treinador->id)}}" class="d-inline-flex a-poke">
                    <div class="card card-poke">
                        <div class="card-body">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('images/' . $treinador->foto) }}" alt="{{ $treinador->nome }}" class="card-img-top mx-auto mb-3" style="width: 100px; height: 100px;">
                            <p class="pokemon-text">Nome: {{$treinador->nome}}</p>
                            <p class="pokemon-text">Cidade: {{$treinador->cidade}}</p>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
        @endforeach
      </div>
</div>



@endsection 
