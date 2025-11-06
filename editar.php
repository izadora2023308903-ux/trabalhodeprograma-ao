<?php
// Cria uma nova conexão com o banco de dados MySQL chamado "petshop"
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");
// Verifica se foi passado um ID na URL (por exemplo: editar.php?id=3)
// Se não houver, o sistema mostra uma mensagem e encerra.
if (!isset($_GET['id'])) {
    echo "ID não informado.";
    exit;
}
// Armazena o ID recebido via URL na variável $id
$id = $_GET['id'];
// Prepara uma consulta SQL para buscar o pet com o ID informado
$stmt = $pdo->prepare("SELECT * FROM pets WHERE id = :id");
$stmt->bindParam(':id', $id);// Substitui o :id pelo valor real da variável
$stmt->execute();// Executa a consulta
$pet = $stmt->fetch();// Busca o resultado (apenas uma linha)
// Se não encontrar nenhum pet com esse ID, mostra mensagem de erro
if (!$pet) {
    echo "Pet não encontrado.";
    exit;
}
?>
<!-- Título da página -->
<h2>Editar Aluno</h2>
<!-- Formulário para edição dos dados do pet -->
<!-- O formulário envia as informações para o arquivo "atualizar.php", que grava as alterações no banco -->
<form action="atualizar.php" method="post">
 <!-- Campo oculto com o ID do pet, necessário para identificar qual registro será atualizado -->
  <input type="hidden" name="id" value="<?= $pet['id'] ?>">
<!-- Campos do formulário preenchidos com os valores atuais do pet -->
 Animal: <input type="text" name="animal" value="<?= $pet['animal'] ?>"><br>
 Nome: <input type="text" name="nome" value="<?= $pet['nome'] ?>"><br>
 Raça: <input type="text" name="raca" value="<?= $pet['raca'] ?>"><br>
 Porte: <input type="text" name="porte" value="<?= $pet['porte'] ?>"><br>
 Sexo: <input type="text" name="sexo" value="<?= $pet['sexo'] ?>"><br>
 Idade: <input type="number" name="idade" value="<?= $pet['idade'] ?>"><br>
 Castrado: <input type="text" name="castrado" value="<?= $pet['castrado'] ?>"><br>
 Observação: <input type="text" name="observacao" value="<?= $pet['observacao'] ?>"><br>
 <!-- Botão para enviar as alterações -->
  <button type="submit">Salvar</button>
</form>
