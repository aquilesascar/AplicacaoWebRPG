<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $recompensa = $_POST['recompensa'];
    $dificuldade = $_POST['dificuldade'];

    try {
        $sql = "INSERT INTO aquiles_rpg.missoes (titulo, recompensa, dificuldade) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $recompensa, $dificuldade]);
        
        header("Location: missoes.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao salvar missão: " . $e->getMessage();
    }
}
?>