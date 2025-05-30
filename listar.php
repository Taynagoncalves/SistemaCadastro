<?php
include "conexao.php";

$sql = "SELECT * FROM membros";
$result = $conexao->query($sql);

$membros = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $membros[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($membros);
?>
