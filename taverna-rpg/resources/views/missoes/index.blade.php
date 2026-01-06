<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quadro de Missões</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script>
        function confirmarExclusao(titulo) {
            return confirm("Tem certeza que deseja rasgar o pergaminho da missão: " + titulo + "?");
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="{{ url('/') }}">⬅ Voltar para a Home</a>
        
        <h2>📜 Nova Missão (Laravel)</h2>

        @if(session('sucesso'))
            <div style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 10px;">
                {{ session('sucesso') }}
            </div>
        @endif
        
        <form action="{{ route('missoes.store') }}" method="POST">
            @csrf <input type="text" name="titulo" placeholder="Título da Missão" required style="width: 300px;">
            <input type="number" step="0.01" name="recompensa" placeholder="Ouro ($)" required>
            
            <select name="dificuldade">
                <option value="Fácil">Fácil</option>
                <option value="Média">Média</option>
                <option value="Difícil">Difícil</option>
                <option value="Mortal">Mortal</option>
            </select>
            
            <button type="submit">Publicar</button>
        </form>

        <hr>

        <h3>Quadro de Avisos</h3>
        <table>
            <tr>
                <th>ID</th><th>Missão</th><th>Recompensa</th><th>Dificuldade</th><th>Ações</th>
            </tr>
            @foreach($missoes as $missao)
            <tr>
                <td>{{ $missao->id }}</td>
                <td>{{ $missao->titulo }}</td>
                <td>{{ $missao->recompensa }}</td>
                <td>{{ $missao->dificuldade }}</td>
                <td>
                    <a href="{{ route('missoes.edit', $missao->id) }}">✏️ Editar</a> | 
                    
                    <form action="{{ route('missoes.destroy', $missao->id) }}" method="POST" style="display:inline;" onsubmit="return confirmarExclusao('{{ $missao->titulo }}')">
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