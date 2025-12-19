<?php
include 'conexao.php';

//verifica se os dados chegaram via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $classe = $_POST['classe'];
    $nivel = $_POST['nivel'];

    try {
        
        $sql = "INSERT INTO aquiles_rpg.herois (nome, classe, nivel) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $classe, $nivel]);
        
        // SUCESSO: Manda o usuário de volta para a lista
        header("Location: herois.php");
        exit();

    } catch (PDOException $e) {
        echo "Erro ao salvar: " . $e->getMessage();
    }
}
?>