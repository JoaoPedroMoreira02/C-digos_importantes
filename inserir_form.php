<?php

$conexao = mysqli_connect('192.168.15.187:3306','microcamp','123');
$banco = mysqli_select_db($conexao, 'bd_cadastro');
mysqli_set_charset($conexao, 'utf8');

$nome = $_REQUEST['nome'];
$sobrenome = $_REQUEST['sobrenome'];
$telefone = $_REQUEST['telefone'];
$email = $_REQUEST['email'];

$sql = "INSERT INTO tb_pessoas (NOME, SOBRENOME, TELEFONE, EMAIL) 
VALUES ('$nome', '$sobrenome', '$telefone', '$email')";

if ($conexao->query($sql) === TRUE) {
    echo "Dados cadastrados com sucesso!";
}   else {
    echo "Erro: " . $sql . "<br>" . $conexao->error;
}

?>