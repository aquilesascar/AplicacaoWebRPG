<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Quadro de Missões</title>
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function confirmarExclusao(titulo) {
            return confirm("Tem certeza que deseja rasgar o pergaminho da missão: " + titulo + "?");
        }
    </script>
</head>
<body>
    <div class="container">
        <a href="index.php">⬅ Voltar</a>
        <h2>📜 Nova Missão</h2>
        
        <form action="salvar_missao.php" method="POST">
            <input type="text" name="titulo" placeholder="Título da Missão" required style="width: 300px;">
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
            <?php
            include 'conexao.php';

            $sql = "SELECT * FROM aquiles_rpg.missoes ORDER BY id DESC";
            $stmt = $pdo->query($sql);
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['titulo']) . "</td>";
                echo "<td>" . $row['recompensa'] . "</td>";
                echo "<td>" . $row['dificuldade'] . "</td>";
                echo "<td>";
                // Botões de Editar e Excluir
                echo "<a href='editar_missao.php?id=" . $row['id'] . "'>✏️ Editar</a> | ";
                echo "<a href='excluir_missao.php?id=" . $row['id'] . "' onclick='return confirmarExclusao(\"" . $row['titulo'] . "\")' style='color:red;'>❌ Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>