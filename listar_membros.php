<?php
require 'conexao.php';

$sql = "SELECT 
    m.*, 
    i.nome AS instrumento, 
    a.nome AS atuacao, 
    c.nome AS cargo
FROM membros m
LEFT JOIN instrumentos i ON m.instrumento_id = i.id
LEFT JOIN atuacoes a ON m.atuacao_id = a.id
LEFT JOIN cargos c ON m.cargo_id = c.id
ORDER BY m.nome";

$stmt = $pdo->query($sql);
$membros = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($membros);
?>
