<?php
// Conexão com o banco de dados petshop
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");

// Coleta os dados enviados pelo formulário (via método POST)
$animal = $_POST['animal'];
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$porte = $_POST['porte'];
$raca = $_POST['raca'];
$observacao = $_POST['observacao'];
$castrado = $_POST['castrado'];
$sexo = $_POST['sexo'];

// Gera automaticamente a data atual (AAAA-MM-DD) para o campo data_cadastro
$data_cadastro = date('Y-m-d');

// Prepara o comando SQL de inserção dos dados no banco
$stmt = $pdo->prepare("
    INSERT INTO pets (animal, nome, idade, porte, raca, observacao, castrado, sexo, data_cadastro)
    VALUES (:animal, :nome, :idade, :porte, :raca, :observacao, :castrado, :sexo, :data_cadastro)
");

// Faz a ligação dos parâmetros com as variáveis PHP
$stmt->bindParam(':animal', $animal);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':idade', $idade);
$stmt->bindParam(':porte', $porte);
$stmt->bindParam(':raca', $raca);
$stmt->bindParam(':observacao', $observacao);
$stmt->bindParam(':castrado', $castrado);
$stmt->bindParam(':sexo', $sexo);
$stmt->bindParam(':data_cadastro', $data_cadastro);

// Executa o comando SQL
if ($stmt->execute()) {
    // Exibe mensagem de sucesso e link de volta
    echo "<p>✅ Pet cadastrado com sucesso!</p>";
    echo "<a href='lista_editar.php'>Voltar para a lista</a>";
} else {
    // Exibe mensagem de erro caso algo dê errado
    echo "<p>❌ Erro ao cadastrar o pet.</p>";
}
?>
