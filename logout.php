<?php
// Destroi completamente a sessão atual.
// Após isso, o usuário não estará mais autenticado no sistema.
require_once 'config.php';
// Remove todas as variáveis de sessão atuais.
// Isso "limpa" os dados do usuário logado (ex: nome, email, id).
session_unset();
session_destroy();
// Destroi completamente a sessão atual.
// Após isso, o usuário não estará mais autenticado no sistema.
header("Location: login.php");
// Redireciona o usuário de volta para a página de login.
// Assim que ele faz logout, é levado novamente à tela inicial de autenticação.
exit;
// Finaliza o script para garantir que nada mais seja executado depois do redirecionamento.