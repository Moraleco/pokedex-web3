@extends('template')

@section('content')
    <h1 class="text-center my-4">Cadastrar Treinador</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('treinadores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="cidade" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="cidade" name="cidade" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="foto" class="form-label">Foto:</label>
            <input type="file" class="form-control" id="foto" name="foto" class="form-control-file">
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary mx-4">Criar</button>
            <a href="{{ route('treinadores.index') }}" class="btn btn-secondary mx-4">Voltar</a>
        </div>
    </form>
@endsection
