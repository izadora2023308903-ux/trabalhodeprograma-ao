<?php
$pdo = new PDO("mysql:host=localhost;dbname=petshop", "root", "");

// Total de pets
$total = $pdo->query("SELECT COUNT(*) FROM pets")->fetchColumn();

// Quantidade por tipo de animal
$animais = $pdo->query("SELECT animal, COUNT(*) as qtd FROM pets GROUP BY animal")->fetchAll();

// Quantos são castrados e quantos não
$castrados = $pdo->query("SELECT castrado, COUNT(*) as qtd FROM pets GROUP BY castrado")->fetchAll();
?>

<h2>Relatório do PetShop 🐶🐱</h2>

<p><strong>Total de Pets Cadastrados:</strong> <?= $total ?></p>

<h3>Por Tipo de Animal:</h3>
<ul>
<?php foreach ($animais as $a): ?>
  <li><?= $a['animal'] ?>: <?= $a['qtd'] ?></li>
<?php endforeach; ?>
</ul>

<h3>Por Situação de Castração:</h3>
<ul>
<?php foreach ($castrados as $c): ?>
  <li><?= $c['castrado'] ?>: <?= $c['qtd'] ?></li>
<?php endforeach; ?>
</ul>

<a href="lista_editar.php">Voltar</a>
