<?php
// Importa o arquivo de configuração do sistema (config.php).
// Esse arquivo normalmente contém a conexão com o banco de dados e o comando session_start().
require_once 'config.php';
// Verifica se o usuário está logado, através da variável de sessão 'user_id'.
// Se não estiver logado, o script redireciona o usuário para a página de login.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;// Encerra a execução do código após o redirecionamento.
}
?>

<form action="inserir.php" method="POST">
<!--Campo para o tipo de animal.-->
 Animal: <input type="text" name="animal"><br>
<!--Campopara o nome do animal.-->
 Nome: <input type="text" name="nome" ><br>
<!--Campo para a raça do animal.-->
 Raça: <input type="text" name="raca" ><br>
<!--Campo para o porte do animal.-->
 Porte: <input type="text" name="porte" ><br>
<!--Campo para o sexo do animal.-->
 Sexo: <input type="text" name="sexo" ><br>
<!--Campo para a idade do animal.-->
 Idade: <input type="number" name="idade" ><br>
<!--Campo para se o animal é castrado.-->
 Castrado: <input type="text" name="castrado" ><br>
<!--Campo para observações adicionais sobre o animal.-->
 Observação: <input type="text" name="observacao" >
 <input type="submit" value="Cadastrar">
</form>