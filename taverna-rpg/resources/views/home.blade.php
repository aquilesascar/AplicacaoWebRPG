<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Taverna do Dragão</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>
<body>
    <div class="container">
        <h1>🐉 Taverna do Dragão 🐉</h1>
        <p>Bem-vindo, Mestre da Guilda (Laravel Edition).</p>
        <br>
        
        <a href="{{ route('herois.index') }}">
            <button>🛡️ Gerenciar Heróis</button>
        </a>
        
        &nbsp;&nbsp;&nbsp;
        
        <a href="{{ route('missoes.index') }}">
            <button>📜 Gerenciar Missões</button>
        </a>
        
        <br><br>
        <img src="https://img.icons8.com/?size=100&id=HH4w8R2fVb0R&format=png&color=000000" alt="RPG">
    </div>
</body>
</html>