<?php
include 'conexao.php';

// Verifica ID
if (!isset($_GET['id'])) {
    header("Location: missoes.php");
    exit();
}

$id = $_GET['id'];

// Busca dados atuais
$sql = "SELECT * FROM aquiles_rpg.missoes WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$missao = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$missao) {
    die("Missão não encontrada!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Missão</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>✏️ Reescrevendo Missão #<?php echo $missao['id']; ?></h2>
        
        <form action="atualizar_missao.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $missao['id']; ?>">
            
            <label>Título:</label><br>
            <input type="text" name="titulo" value="<?php echo $missao['titulo']; ?>" required style="width: 300px;"><br>
            
            <label>Recompensa (Ouro):</label><br>
            <input type="number" step="0.01" name="recompensa" value="<?php echo $missao['recompensa']; ?>" required><br>
            
            <label>Dificuldade:</label><br>
            <select name="dificuldade">
                <option value="Fácil"   <?php echo ($missao['dificuldade']=='Fácil')?'selected':''; ?>>Fácil</option>
                <option value="Média"   <?php echo ($missao['dificuldade']=='Média')?'selected':''; ?>>Média</option>
                <option value="Difícil" <?php echo ($missao['dificuldade']=='Difícil')?'selected':''; ?>>Difícil</option>
                <option value="Mortal"  <?php echo ($missao['dificuldade']=='Mortal')?'selected':''; ?>>Mortal</option>
            </select><br>
            
            <br>
            <button type="submit">Salvar Alterações</button>
            <br><br>
            <a href="missoes.php">Cancelar</a>
        </form>
    </div>
</body>
</html>