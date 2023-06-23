<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Pokémons</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .pokemon-img {
            max-width: 100px;
        }
    </style>
</head>
<body>
    <h1>Listagem de Pokémons</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Nível</th>
                <th>Treinador</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pokemons as $pokemon)
                <tr>
                    <td>{{ $pokemon->id }}</td>
                    <td>{{ $pokemon->nome }}</td>
                    <td>{{ $pokemon->tipo }}</td>
                    <td>{{ $pokemon->nivel }}</td>
                    <td>{{ $pokemon->treinador ? $pokemon->treinador->nome : '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
