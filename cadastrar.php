<?php

require 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
       
        $nome       = $_POST['nome'] ?? '';
        $telefone   = $_POST['telefone'] ?? '';
        $endereco   = $_POST['endereco'] ?? '';
        $cep        = $_POST['cep'] ?? '';
        $numero     = $_POST['numero'] ?? '';
        $bairro     = $_POST['bairro'] ?? '';
        $sexo       = $_POST['sexo'] ?? '';
        $batizado   = $_POST['batizado'] ?? '';
        $musico     = $_POST['musico'] ?? '';
        $instrumento = $_POST['instrumento'] ?? '';
        $atuacao    = $_POST['atuacao'] ?? '';
        $organista  = $_POST['organista'] ?? '';
        $cargo      = $_POST['cargo'] ?? '';

       
        $sql = "INSERT INTO membros 
            (nome, telefone, endereco, cep, numero, bairro, sexo, batizado, musico, instrumento, atuacao, organista, cargo)
            VALUES 
            (:nome, :telefone, :endereco, :cep, :numero, :bairro, :sexo, :batizado, :musico, :instrumento, :atuacao, :organista, :cargo)";
        
        $stmt = $pdo->prepare($sql);

     
        $stmt->execute([
            ':nome'       => $nome,
            ':telefone'   => $telefone,
            ':endereco'   => $endereco,
            ':cep'        => $cep,
            ':numero'     => $numero,
            ':bairro'     => $bairro,
            ':sexo'       => $sexo,
            ':batizado'   => $batizado,
            ':musico'     => $musico,
            ':instrumento'=> $instrumento,
            ':atuacao'    => $atuacao,
            ':organista'  => $organista,
            ':cargo'      => $cargo
        ]);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido']);
}
