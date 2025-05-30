<?php
include ("conexao.php");

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

$sql = "INSERT INTO membros (nome, telefone, endereco, cep, numero, bairro, sexo, batizado, musico, instrumento, atuacao, organista, cargo)
        VALUES ($nome, $telefone, $endereco, $cep, $numero, $bairro, $sexo, $batizado, $musico, $instrumento, $atuacao, $organista, $cargo)";


if (mysqli_query($conexao, $sql)){
    echo "usuário cadastrado com sucesso.";

}
 else{
    echo "Erro" .mysqli_connect_error($conexao);
    }

mysqli_close($conexao);
?>
