<?php
$host = "localhost";
$user = "root";
$pass = "123456";
$dbname = "sistema_cadastro";

$conexao = new mysqli($host, $user, $pass, $dbname);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
