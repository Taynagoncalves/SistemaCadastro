<?php
require 'conexao.php';

$data = json_decode(file_get_contents('php://input'), true);


$sql = "UPDATE membros SET
    nome = :nome,
    telefone = :telefone,
    endereco = :endereco,
    cep = :cep,
    numero = :numero,
    bairro = :bairro,
    sexo = :sexo,
    batizado = :batizado,
    musico = :musico,
    instrumento_id = :instrumento_id,
    atuacao_id = :atuacao_id,
    organista = :organista,
    cargo_id = :cargo_id
WHERE id = :id";

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
    ':cargo_id' => $data['cargo_id'] ?: null,
    ':id' => $data['id']
]);

echo json_encode(['status' => 'ok']);
?>
