<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Missão</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
    <div class="container">
        <h2>✏️ Reescrevendo Missão #{{ $missao->id }}</h2>
        
        <form action="{{ route('missoes.update', $missao->id) }}" method="POST">
            @csrf
            @method('PUT') <label>Título:</label><br>
            <input type="text" name="titulo" value="{{ $missao->titulo }}" required style="width: 300px;"><br>
            
            <label>Recompensa (Ouro):</label><br>
            <input type="number" step="0.01" name="recompensa" value="{{ $missao->recompensa }}" required><br>
            
            <label>Dificuldade:</label><br>
            <select name="dificuldade">
                <option value="Fácil"   {{ $missao->dificuldade == 'Fácil' ? 'selected' : '' }}>Fácil</option>
                <option value="Média"   {{ $missao->dificuldade == 'Média' ? 'selected' : '' }}>Média</option>
                <option value="Difícil" {{ $missao->dificuldade == 'Difícil' ? 'selected' : '' }}>Difícil</option>
                <option value="Mortal"  {{ $missao->dificuldade == 'Mortal' ? 'selected' : '' }}>Mortal</option>
            </select><br>
            
            <br>
            <button type="submit">Salvar Alterações</button>
            <br><br>
            <a href="{{ route('missoes.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>