@extends('template')

@section('content')
    <h1 class="text-center my-4">Editar Pokémon</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemons.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $pokemon->nome }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nivel" class="form-label">Nível:</label>
            <input type="number" id="nivel" name="nivel" value="{{ $pokemon->nivel }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" id="tipo" name="tipo" value="{{ $pokemon->tipo }}" class="form-control">
        </div>
        <div class="row mb-2">
            <label for="foto" class="form-label">Foto:</label>
            <div class="col-sm-2">  
                @if(!empty($pokemon->foto))
                <img src="{{ asset('images/' . $pokemon->foto) }}" alt="{{ $pokemon->nome }}" class="img-thumbnail">
                @endif
            </div>
            <div class="col">
            <input type="file" id="foto" name="foto" class="form-control">
            </div>
        </div>
        <div>
            <label for="treinador_id" class="form-label">Treinador:</label>
            <select id="treinador_id" name="treinador_id" class="form-control">
                <option value="">Sem Treinador</option>
                @foreach($treinadores as $treinador)
                    <option value="{{ $treinador->id }}" {{ $pokemon->treinador_id == $treinador->id ? 'selected' : '' }}>{{ $treinador->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mx-4">Atualizar</button>
            <a href="{{ route('pokemons.index') }}" class="btn btn-secondary mx-4">Voltar</a>
        </div>       
    </form>
@endsection
