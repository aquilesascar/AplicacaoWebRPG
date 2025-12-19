<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $recompensa = $_POST['recompensa'];
    $dificuldade = $_POST['dificuldade'];

    try {
        $sql = "UPDATE aquiles_rpg.missoes SET titulo = ?, recompensa = ?, dificuldade = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $recompensa, $dificuldade, $id]);
        
        header("Location: missoes.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao atualizar missão: " . $e->getMessage();
    }
}
?>