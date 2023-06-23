@extends('template')

@section('content')
    <div class="container">
        <h1>Pokémons</h1>
        <form method="GET" action="{{ route('pokemons.index') }}">
            <div class="row mb-3">
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="nome" placeholder="Nome"
                           value="{{ $filters['nome'] ?? '' }}">
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="tipo">
                        <option value="">Tipo</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo }}"
                                    {{ (isset($filters['tipo']) && $filters['tipo'] == $tipo) ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="nivel_minimo" placeholder="Nível"
                           value="{{ $filters['nivel_minimo'] ?? '' }}">
                </div>
                <div class="col-sm-2">
                    <select class="form-control" name="treinador_id">
                        <option value="">Treinador</option>
                        <option value="null" {{ (isset($filters['treinador_id']) && $filters['treinador_id'] === null) ? 'selected' : '' }}>
                            Sem Treinador
                        </option>                        
                        @foreach ($treinadores as $treinador)
                            <option value="{{ $treinador->id }}"
                                    {{ (isset($filters['treinador_id']) && $filters['treinador_id'] == $treinador->id) ? 'selected' : '' }}>
                                {{ $treinador->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <a href="{{ route('pokemons.create') }}" class="btn btn-success">Cadastrar</a>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ route('pokemons.index') }}" class="btn btn-danger">Limpar</a>
                    {{-- <a href="{{ route('pokemons.index', ['sem_treinador' => true]) }}" class="btn btn-secondary">
                        Mostrar sem treinador
                    </a> --}}
                </div>
            </div>
        </form>

        <div class="">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Nível</th>
                        <th>Treinador</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pokemons as $pokemon)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $pokemon->foto) }}"
                                     alt="{{ $pokemon->nome }}" width="100">
                            </td>
                            <td>{{ $pokemon->nome }}</td>
                            <td>{{ $pokemon->tipo }}</td>
                            <td>{{ $pokemon->nivel }}</td>
                            <td>{{ $pokemon->treinador ? $pokemon->treinador->nome : 'Sem Treinador' }}</td>
                            <td>
                                <a href="{{ route('pokemons.show', $pokemon->id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('pokemons.edit', $pokemon->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('pokemons.destroy', $pokemon->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir este Pokémon?')">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('pokemon.pdf', request()->all()) }}" class="btn btn-secondary">
            Gerar PDF
        </a>
        <div class="d-flex justify-content-center" style="padding-top: 2em">
            {{ $pokemons->appends(request()->query())->links() }}
        </div>
    </div>
    
@endsection
