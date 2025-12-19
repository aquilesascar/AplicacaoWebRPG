<?php
// $host = "10.90.24.54";   // LABORATÓRIO
$host = "200.18.128.54"; // CASA

$dbname = "aula";
$user = "aula"; 
$password = "aula";

try {
    // Conexão via PDO (funciona para PostgreSQL)
    // Se der erro de driver, verifique se extension=pdo_pgsql está ativa no XAMPP
    $pdo = new PDO("pgsql:host=$host;port=5432;dbname=$dbname", $user, $password);
    
    // Configura para gerar erros visíveis caso algo dê errado
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>