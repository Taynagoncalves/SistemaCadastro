<?php
include "conexao.php";

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$cep = $_POST['cep'] ?? '';
$numero = $_POST['numero'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$sexo = $_POST['sexo'] ?? '';
$batizado = $_POST['batizado'] ?? '';
$musico = $_POST['musico'] ?? '';
$instrumento = $_POST['instrumento'] ?? '';
$atuacao = $_POST['atuacao'] ?? '';
$organista = $_POST['organista'] ?? '';
$cargo = $_POST['cargo'] ?? '';

if (empty($id)) {
    echo "ID inválido";
    exit;
}

$sql = "UPDATE membros SET nome=?, telefone=?, endereco=?, cep=?, numero=?, bairro=?, sexo=?, batizado=?, musico=?, instrumento=?, atuacao=?, organista=?, cargo=? WHERE id=?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssssssssssi", $nome, $telefone, $endereco, $cep, $numero, $bairro, $sexo, $batizado, $musico, $instrumento, $atuacao, $organista, $cargo, $id);

if ($stmt->execute()) {
    echo "ok";
} else {
    echo "Erro ao editar";
}
?>
