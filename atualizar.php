<?php
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");

$id = $_POST['id'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$animal = $_POST['animal'];
$raca = $_POST['raca'];
$idade = $_POST['idade'];
$porte = $_POST['porte'];
$castrado = $_POST['castrado'];
$observacao = $_POST['observacao'];

$stmt = $pdo->prepare("UPDATE pets SET nome = :nome, animal = :animal, idade = :idade, raca = :raca, porte = :porte, sexo = :sexo, castrado = :castrado, observacao = :observacao WHERE id = :id");
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':animal', $animal);
$stmt->bindParam(':raca', $raca);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':porte', $porte);
$stmt->bindParam(':castrado', $castrado);
$stmt->bindParam(':observacao', $observacao);
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo "Pet atualizado com sucesso! <a href='lista_editar.php'>Voltar</a>";
} else {
    echo "Erro ao atualizar pet.";
}
?>
