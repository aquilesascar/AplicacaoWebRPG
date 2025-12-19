<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $classe = $_POST['classe'];
    $nivel = $_POST['nivel'];

    try {
        $sql = "UPDATE aquiles_rpg.herois SET nome = ?, classe = ?, nivel = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $classe, $nivel, $id]);
        
        header("Location: herois.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao atualizar: " . $e->getMessage();
    }
}
?>