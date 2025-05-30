<?php
require 'conexao.php';

$data = json_decode(file_get_contents('php://input'), true);

$sql = "INSERT INTO membros (
    nome, telefone, endereco, cep, numero, bairro, sexo, batizado,
    musico, instrumento_id, atuacao_id, organista, cargo_id
) VALUES (
    :nome, :telefone, :endereco, :cep, :numero, :bairro, :sexo, :batizado,
    :musico, :instrumento_id, :atuacao_id, :organista, :cargo_id
)";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':nome' => $data['nome'],
    ':telefone' => $data['telefone'],
    ':endereco' => $data['endereco'],
    ':cep' => $data['cep'],
    ':numero' => $data['numero'],
    ':bairro' => $data['bairro'],
    ':sexo' => $data['sexo'],
    ':batizado' => $data['batizado'],
    ':musico' => $data['musico'],
    ':instrumento_id' => $data['instrumento_id'] ?: null,
    ':atuacao_id' => $data['atuacao_id'] ?: null,
    ':organista' => $data['organista'],
    ':cargo_id' => $data['cargo_id'] ?: null
]);

echo json_encode(['status' => 'ok']);
?>
