<?php
// Importa o arquivo de configuração principal do sistema.
// Normalmente, "config.php" contém a conexão com o banco e o comando session_start().
require_once 'config.php';
// Verifica se existe uma sessão ativa com o ID do usuário.
// Isso garante que apenas usuários logados possam acessar a página.
if (!isset($_SESSION['user_id'])) {
// Se o usuário não estiver logado, ele é redirecionado para a página de login.    
    header("Location: login.php");
    exit; // Interrompe a execução do script após o redirecionamento.
}
?>

<?php
// Cria uma nova conexão com o banco de dados usando PDO.
// O banco utilizado é o "petshop", rodando localmente (localhost).
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");
// Prepara uma consulta SQL para selecionar todos os registros da tabela "pets".
$stmt = $pdo->prepare("SELECT * FROM pets");
// Executa a consulta.
$stmt->execute();
// Pega todos os resultados retornados e armazena no array $dados.
$dados = $stmt->fetchAll();
// Faz um loop para percorrer todos os pets retornados.
// A cada iteração, imprime o ID e o nome do pet.
foreach ($dados as $pet) {
    echo $pet['id'] . " - " . $pet['nome'] . "<br>";
}

?>
