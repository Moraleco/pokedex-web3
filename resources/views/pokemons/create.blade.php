@extends('template')

@section('content')
    <h1 class="text-center my-4">Cadastrar Pokémon</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pokemons.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-3">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        
        <div class="form-group mb-3">
            <label for="nivel">Nível:</label>
            <input type="number" id="nivel" name="nivel" class="form-control">
        </div>
        
        <div class="form-group mb-3">
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" class="form-control">
        </div>
        
        <div class="form-group mb-3">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" class="form-control">
                <option value="">Selecione um tipo</option>
                @foreach ($tipos as $tipo)
                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group mb-3">
            <label for="treinador_id">Treinador:</label>
            <select id="treinador_id" name="treinador_id" class="form-control">
                <option value="">Sem Treinador</option>
                @foreach ($treinadores as $treinador)
                    <option value="{{ $treinador->id }}">{{ $treinador->nome }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mx-4">Criar</button>
            <a href="{{ route('pokemons.index') }}" class="btn btn-secondary mx-4">Voltar</a>
        </div>
    </form>
@endsection
