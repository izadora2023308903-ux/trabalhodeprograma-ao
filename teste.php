<?php
require_once 'config.php';

$stmt = $pdo->query("SELECT id, nome, email, senha_hash FROM usuarios");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($result);
echo "</pre>";
