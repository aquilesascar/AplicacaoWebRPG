<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Heróis da Guilda</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="container">
        <a href="index.php">⬅ Voltar</a>
        <h2>🛡️ Recrutar Novo Herói</h2>
        
        <form action="salvar_heroi.php" method="POST">
            <input type="text" name="nome" placeholder="Nome do Herói" required>
            <select name="classe">
                <option value="Guerreiro">Guerreiro</option>
                <option value="Mago">Mago</option>
                <option value="Ladino">Ladino</option>
                <option value="Clérigo">Clérigo</option>
            </select>
            <input type="number" name="nivel" placeholder="Nível" min="1" max="100" required>
            <button type="submit">Cadastrar</button>
        </form>

        <hr>

        <h3>Membros Ativos</h3>
        <table>
            <tr>
                <th>ID</th><th>Nome</th><th>Classe</th><th>Nível</th>
            </tr>
            <?php
            // Inclui a conexão aqui para fazer a listagem
            include 'conexao.php';
            
            $sql = "SELECT * FROM aquiles_rpg.herois ORDER BY id DESC";
            $stmt = $pdo->query($sql);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                echo "<td>" . $row['classe'] . "</td>";
                echo "<td>" . $row['nivel'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>