<?php
// Importa o arquivo de configuração do sistema (config.php),
// que normalmente contém a conexão com o banco de dados e o início da sessão.
require_once 'config.php';
// Cria uma variável para armazenar mensagens de erro (inicialmente vazia).
$erro = '';
// Verifica se o formulário foi enviado via método POST (ou seja, se o usuário clicou em "Entrar").
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Captura o email enviado pelo formulário, removendo espaços extras nas bordas.
    $email = trim($_POST['email']);
// Captura a senha enviada (não é necessário usar trim, pois pode haver espaços).
    $senha = $_POST['senha'];
// Prepara uma consulta SQL para buscar o usuário com o email informado.
// O uso de ":email" evita SQL Injection (técnica de segurança importante).
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
// Executa a consulta substituindo o parâmetro ":email" pelo valor da variável $email.
    $stmt->execute(['email' => $email]);
// Armazena o resultado da consulta (um único usuário) na variável $user.
    $user = $stmt->fetch();
// Verifica se o usuário foi encontrado e se a senha digitada está correta.
// A função password_verify() compara a senha digitada com o hash armazenado no banco.
    if ($user && password_verify($senha, $user['senha_hash'])) {
// Se as credenciais forem válidas, salva informações do usuário na sessão.
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];
// Redireciona o usuário para a página principal (index.php).
        header("Location: index.php");
        exit;
    } else {
// Caso o email ou senha estejam errados, define uma mensagem de erro.
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - PetShop</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
  <h2>Login - PetShop 🐾</h2>
  <?php if ($erro): ?><div class="erro"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
  <form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit">Entrar</button>
  </form>
</div>
</body>
</html>
