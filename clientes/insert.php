<?php

$cpf = filter_var($_POST['txtCpf'],FILTER_SANITIZE_SPECIAL_CHARS);

$nome = filter_var($_POST['txtNome'],FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_var($_POST['txtEmail'],FILTER_SANITIZE_EMAIL);

$fone = filter_var($_POST['txtFone'],FILTER_SANITIZE_SPECIAL_CHARS);

$dataNasc = filter_var($_POST['txtDataNasc'],FILTER_SANITIZE_SPECIAL_CHARS);

$cidade = filter_var($_POST['txtCidade'],FILTER_SANITIZE_SPECIAL_CHARS);

$sexo = filter_var($_POST['txtSexo'],FILTER_SANITIZE_SPECIAL_CHARS);

$renda = filter_var($_POST['txtRenda'],FILTER_SANITIZE_NUMBER_FLOAT);

$senha = filter_var($_POST['txtSenha'],FILTER_SANITIZE_SPECIAL_CHARS);

$bloqueado = filter_var($_POST['txtBloqueado'],FILTER_SANITIZE_SPECIAL_CHARS);

$obs = filter_var($_POST['txtObs'],FILTER_SANITIZE_SPECIAL_CHARS);


$erros = [];

if (empty($cpf)) {
    array_push($erros,'Preencha o campo CPF!');
}

if (empty($nome)) {
    array_push($erros,'Preencha o campo NOME!');
}

if (mb_strlen($nome) < 3) {
    array_push($erros,'O Nome deve conter no mínimo 3 letras!');
}

if (empty($senha)) {
    array_push($erros,'Preencha o campo SENHA!');
} else {
    $salt = uniqid();
    $senhaCriptografada = password_hash($senha.$salt,PASSWORD_DEFAULT);
}

if ( count($erros) == 0 ) {

    require_once '../core/conexao.php';

    $insert = $pdo->prepare('INSERT INTO clientes (nome, cpf, email, fone, senha, data_nascimento, sexo, bloqueado, cidade, obs, salt, renda) VALUES (:nome, :cpf, :email, :fone, :senha, :data_nascimento, :sexo, :bloqueado, :cidade, :obs, :salt, :renda)'); 

    $insert->bindValue(':nome',$nome);
    $insert->bindValue(':cpf',$cpf);
    $insert->bindValue(':email',$email);
    $insert->bindValue(':fone',$fone);
    $insert->bindValue(':senha',$senha);
    $insert->bindValue(':data_nascimento',$dataNasc);
    $insert->bindValue(':sexo',$sexo);
    $insert->bindValue(':bloqueado',$bloqueado);
    $insert->bindValue(':cidade',$cidade);
    $insert->bindValue(':obs',$obs);
    $insert->bindValue(':salt',$salt);
    $insert->bindValue(':renda',$renda);

    $insert->execute();

}

