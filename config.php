<?php
// Inicia a sessão PHP.
// Isso permite armazenar e acessar variáveis globais, como informações do usuário logado.
session_start();
// Configurações de acesso ao banco de dados MySQL.
$DB_HOST = 'localhost';// Endereço do servidor de banco de dados (localhost = o próprio computador)
$DB_NAME = 'petshop';// Nome do banco de dados
$DB_USER = 'root';// Nome do usuário do banco (padrão do XAMPP)
$DB_PASS = '';// Senha do banco (vazia por padrão no XAMPP)
// Cria uma nova conexão com o banco de dados usando PDO (PHP Data Objects)
// O PDO é uma forma segura e moderna de conectar e manipular bancos no PHP
try {
 // Define o modo de erro para "Exception", para que o PHP exiba mensagens de erro detalhadas
    $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER, $DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Caso aconteça algum erro na conexão (ex: banco inexistente, senha errada),
// o script será interrompido e mostrará uma mensagem explicando o problema.
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
