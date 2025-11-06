<?php
// Conexão com o banco de dados "petshop" usando PDO
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");

// ---------------------- FILTROS DE CONSULTA ----------------------

// Armazena os valores vindos do formulário (se houver)
$campo = $_GET['campo'] ?? '';
$valor = $_GET['valor'] ?? '';
$data_inicio = $_GET['data_inicio'] ?? '';
$data_fim = $_GET['data_fim'] ?? '';

// Base da consulta SQL
$sql = "SELECT * FROM pets WHERE 1=1";
$params = [];

// Filtro por campo (animal, nome, raça, etc.)
if (!empty($campo) && !empty($valor)) {
    $sql .= " AND $campo LIKE :valor";
    $params[':valor'] = "%$valor%";
}

// Filtro por data (entre data início e data fim)
if (!empty($data_inicio) && !empty($data_fim)) {
    $sql .= " AND data_cadastro BETWEEN :inicio AND :fim";
    $params[':inicio'] = $data_inicio;
    $params[':fim'] = $data_fim;
}

// Prepara e executa a consulta com segurança
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

// Busca todos os registros encontrados
$pets = $stmt->fetchAll();

// ---------------------- RELATÓRIO SIMPLES ----------------------
// Conta quantos pets foram encontrados
$total = count($pets);
?>

<h2>Lista de Pets 🐾</h2>

<!-- ---------------------- FORMULÁRIO DE FILTRO ---------------------- -->
<form method="GET" style="margin-bottom: 15px;">

  <label>Filtrar por:</label>
  <select name="campo">
    <option value="">Selecione</option>
    <option value="animal" <?= ($campo=='animal'?'selected':'') ?>>Animal</option>
    <option value="nome" <?= ($campo=='nome'?'selected':'') ?>>Nome</option>
    <option value="raca" <?= ($campo=='raca'?'selected':'') ?>>Raça</option>
  </select>

  <input type="text" name="valor" placeholder="Digite o valor" value="<?= htmlspecialchars($valor) ?>">

  <!-- Filtro por intervalo de datas -->
  <label>De:</label>
  <input type="date" name="data_inicio" value="<?= htmlspecialchars($data_inicio) ?>">
  
  <label>Até:</label>
  <input type="date" name="data_fim" value="<?= htmlspecialchars($data_fim) ?>">

  <button type="submit">Filtrar</button>
  <a href="lista_editar.php">Limpar</a>
</form>

<!-- ---------------------- RELATÓRIO DE RESUMO ---------------------- -->
<p><strong>Total de pets encontrados:</strong> <?= $total ?></p>

<!-- ---------------------- TABELA DE RESULTADOS ---------------------- -->
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Animal</th>
    <th>Nome</th>
    <th>Raça</th>
    <th>Porte</th>
    <th>Idade</th>
    <th>Sexo</th>
    <th>Castrado</th>
    <th>Observação</th>
    <th>Data Cadastro</th>
    <th colspan="2">Ações</th>
  </tr>

  <!-- Exibe todos os registros -->
  <?php foreach ($pets as $pet): ?>
    <tr>
      <td><?= $pet['id'] ?></td>
      <td><?= $pet['animal'] ?></td>
      <td><?= $pet['nome'] ?></td>
      <td><?= $pet['raca'] ?></td>
      <td><?= $pet['porte'] ?></td>
      <td><?= $pet['idade'] ?></td>
      <td><?= $pet['sexo'] ?></td>
      <td><?= $pet['castrado'] ?></td>
      <td><?= $pet['observacao'] ?></td>
      <td><?= $pet['data_cadastro'] ?></td>
      <td><a href="editar.php?id=<?= $pet['id'] ?>">Editar</a></td>
      <td><a href="deletar.php?id=<?= $pet['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a></td>
    </tr>
  <?php endforeach; ?>
</table>
