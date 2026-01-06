<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Heróis da Guilda</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script>
        function confirmarExclusao(nome) {
            return confirm("Tem certeza que deseja banir o herói " + nome + " da guilda?");
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="{{ url('/') }}">⬅ Voltar para a Home</a>

        <h2>🛡️ Gerenciar Heróis (Laravel)</h2>
        
        <form action="{{ route('herois.store') }}" method="POST">
            @csrf <input type="text" name="nome" placeholder="Nome" required>
            <select name="classe">
                <option value="Guerreiro">Guerreiro</option>
                <option value="Mago">Mago</option>
                <option value="Ladino">Ladino</option>
                <option value="Clérigo">Clérigo</option>
            </select>
            <input type="number" name="nivel" placeholder="Nível" required min="1" max="100">
            <button type="submit">Cadastrar</button>
        </form>

        <hr>

        <h3>Membros Ativos</h3>
        <table>
            <tr>
                <th>ID</th><th>Nome</th><th>Classe</th><th>Nível</th><th>Ações</th>
            </tr>
            @foreach($herois as $heroi)
            <tr>
                <td>{{ $heroi->id }}</td>
                <td>{{ $heroi->nome }}</td>
                <td>{{ $heroi->classe }}</td>
                <td>{{ $heroi->nivel }}</td>
                <td>
                    <a href="{{ route('herois.edit', $heroi->id) }}">✏️ Editar</a> | 
                    
                    <form action="{{ route('herois.destroy', $heroi->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarExclusao('{{ $heroi->nome }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:none; border:none; color:red; cursor:pointer; text-decoration:underline; font-weight:bold;">❌ Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>