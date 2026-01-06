<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Herói</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
    <div class="container">
        <h2>✏️ Editando: {{ $heroi->nome }}</h2>
        
        <form action="{{ route('herois.update', $heroi->id) }}" method="POST">
            @csrf
            @method('PUT') <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ $heroi->nome }}" required><br>
            
            <label>Classe:</label><br>
            <select name="classe">
                <option value="Guerreiro" {{ $heroi->classe == 'Guerreiro' ? 'selected' : '' }}>Guerreiro</option>
                <option value="Mago"      {{ $heroi->classe == 'Mago' ? 'selected' : '' }}>Mago</option>
                <option value="Ladino"    {{ $heroi->classe == 'Ladino' ? 'selected' : '' }}>Ladino</option>
                <option value="Clérigo"   {{ $heroi->classe == 'Clérigo' ? 'selected' : '' }}>Clérigo</option>
            </select><br>
            
            <label>Nível:</label><br>
            <input type="number" name="nivel" value="{{ $heroi->nivel }}" min="1" max="100" required><br>
            
            <br>
            <button type="submit">Salvar Alterações</button>
            <br><br>
            <a href="{{ route('herois.index') }}">Cancelar</a>
        </form>
    </div>
</body>
</html>