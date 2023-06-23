@extends('template')

@section('content')
    <h1 class="text-center my-4">Treinadores</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Foto</th>
                <th>Pokémons</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($treinadores as $treinador)
                <tr>
                    <td>{{ $treinador->id }}</td>
                    <td>{{ $treinador->nome }}</td>
                    <td>{{ $treinador->cidade }}</td>
                    <td>
                        <img src="{{ asset('images/' . $treinador->foto) }}" alt="{{ $treinador->nome }}"
                            class="rounded img-thumbnail" style="width: 100px; height: 100px;">
                    </td>
                    <td>
                        @if ($treinador->pokemons->isEmpty())
                            Sem Pokémons
                        @else
                            <ul>
                                @foreach ($treinador->pokemons as $pokemon)
                                    <li class="list-unstyled">{{ $pokemon->nome }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('treinadores.show', $treinador->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('treinadores.edit', $treinador->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('treinadores.destroy', $treinador->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Tem certeza que deseja excluir este treinador?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $treinadores->links() }}

    <a href="{{ route('treinadores.create') }}" class="btn btn-success">Cadastrar Treinador</a>
@endsection
