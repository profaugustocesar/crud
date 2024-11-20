<?php

$id = filter_var($_POST['txtId'],FILTER_SANITIZE_NUMBER_INT);

$cpf = filter_var($_POST['txtCpf'],FILTER_SANITIZE_SPECIAL_CHARS);

$nome = filter_var($_POST['txtNome'],FILTER_SANITIZE_SPECIAL_CHARS);

$email = filter_var($_POST['txtEmail'],FILTER_SANITIZE_EMAIL);

$fone = filter_var($_POST['txtFone'],FILTER_SANITIZE_SPECIAL_CHARS);

$dataNasc = filter_var($_POST['txtDataNasc'],FILTER_SANITIZE_SPECIAL_CHARS);

$cidade = filter_var($_POST['txtCidade'],FILTER_SANITIZE_SPECIAL_CHARS);


if (!isset($_POST['txtSexo'])) {
    $sexo = '-';
} else {
    $sexo = filter_var($_POST['txtSexo'],FILTER_SANITIZE_SPECIAL_CHARS);
}




$renda = str_replace('.','',$_POST['txtRenda']);
$renda = str_replace(',','.',$renda);
$renda = filter_var($renda,FILTER_SANITIZE_NUMBER_FLOAT);

$senha = filter_var($_POST['txtSenha'],FILTER_SANITIZE_SPECIAL_CHARS);

if (!isset($_POST['txtBloqueado'])) {
    $bloqueado = false;
} else {
    $bloqueado = filter_var($_POST['txtBloqueado'],FILTER_VALIDATE_BOOL);
}

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

if (!empty($senha)) {
    $salt = uniqid();
    $senhaCriptografada = password_hash($senha.$salt,PASSWORD_DEFAULT);
} 

if ( count($erros) == 0 ) {

    require_once '../core/conexao.php';

    if (empty($senha)) {
        $update = $pdo->prepare('UPDATE clientes SET nome=:nome, cpf=:cpf, email=:email, fone=:fone, data_nascimento=:data_nascimento, sexo=:sexo, bloqueado=:bloqueado, cidade=:cidade, obs=:obs, renda=:renda WHERE id=:id'); 
    } else {
        $update = $pdo->prepare('UPDATE clientes SET nome=:nome, cpf=:cpf, email=:email, fone=:fone, data_nascimento=:data_nascimento, sexo=:sexo, bloqueado=:bloqueado, cidade=:cidade, obs=:obs, renda=:renda, senha=:senha, salt=:salt WHERE id=:id'); 

        $update->bindValue(':senha',$senhaCriptografada);
        $update->bindValue(':salt',$salt);
    }

    $update->bindValue(':id',$id);
    $update->bindValue(':nome',$nome);
    $update->bindValue(':cpf',$cpf);
    $update->bindValue(':email',$email);
    $update->bindValue(':fone',$fone);
    
    $update->bindValue(':data_nascimento',$dataNasc);
    $update->bindValue(':sexo',$sexo);
    $update->bindValue(':bloqueado',$bloqueado);
    $update->bindValue(':cidade',$cidade);
    $update->bindValue(':obs',$obs);
    
    $update->bindValue(':renda',$renda);

    if ($update->execute()) {
        header('Location: index.php');
    } else {
        array_push($erros,'Erro ao salvar os dados na Tabela');
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro</title>

    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <header class="cabecalho">
        <h1>CRUD</h1>
    </header>

    <section class="titulo">
        <h2>Aconteceram os seguintes erros:</h2>
    </section>  

    <main class="dados">
    
        <div class="erro">
            <?php foreach ($erros as $e) { ?>

                <h3>Erro: <?php echo $e; ?></h3>

            <?php } ?>

            <a href="javascript:history.back();">Voltar ao Cadastro</a>
        </div>
    
    </main>

</body>
</html>