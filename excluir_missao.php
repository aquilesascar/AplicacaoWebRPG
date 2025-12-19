<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM aquiles_rpg.missoes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        header("Location: missoes.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir missão: " . $e->getMessage();
    }
}
?>