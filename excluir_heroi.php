<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM aquiles_rpg.herois WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        header("Location: herois.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}
?>