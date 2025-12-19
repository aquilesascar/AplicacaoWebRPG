<?php
include 'conexao.php';

//Verifica se veio um ID na URL
if (!isset($_GET['id'])) {
    header("Location: herois.php");
    exit();
}

$id = $_GET['id'];

//Busca os dados atuais do herói
$sql = "SELECT * FROM aquiles_rpg.herois WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$heroi = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$heroi) {
    die("Herói não encontrado!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Herói</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <h2>✏️ Editando: <?php echo $heroi['nome']; ?></h2>
        
        <form action="atualizar_heroi.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $heroi['id']; ?>">
            
            <label>Nome:</label><br>
            <input type="text" name="nome" value="<?php echo $heroi['nome']; ?>" required><br>
            
            <label>Classe:</label><br>
            <select name="classe">
                <option value="Guerreiro" <?php echo ($heroi['classe']=='Guerreiro')?'selected':''; ?>>Guerreiro</option>
                <option value="Mago"      <?php echo ($heroi['classe']=='Mago')?'selected':''; ?>>Mago</option>
                <option value="Ladino"    <?php echo ($heroi['classe']=='Ladino')?'selected':''; ?>>Ladino</option>
                <option value="Clérigo"   <?php echo ($heroi['classe']=='Clérigo')?'selected':''; ?>>Clérigo</option>
            </select><br>
            
            <label>Nível:</label><br>
            <input type="number" name="nivel" value="<?php echo $heroi['nivel']; ?>" min="1" max="100" required><br>
            
            <br>
            <button type="submit">Salvar Alterações</button>
            <br><br>
            <a href="herois.php">Cancelar</a>
        </form>
    </div>
</body>
</html>