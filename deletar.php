<?php
// Cria a conexão com o banco de dados MySQL "petshop"
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");
// Verifica se o ID foi passado
if (!isset($_GET['id'])) {
    echo "ID não informado.";
    exit;
}
$id = $_GET['id'];
// Prepara a exclusão
$stmt = $pdo->prepare("DELETE FROM pets WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
// Redireciona de volta para a listagem
header("Location: lista_editar.php");
exit;
?>
