<?php
    $id = $_GET['id'];

    require_once '../core/conexao.php';

    $select = $pdo->prepare('SELECT * FROM clientes WHERE id=:id');
    $select->bindValue(':id',$id);
    $select->execute();

    $cliente = $select->fetch();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Clientes</title>

    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <header class="cabecalho">
        <h1>CRUD</h1>
    </header>

    <section class="titulo">
        <h2>Atualização de Clientes</h2>
    </section>  

    <main class="mainFormCadastro">
        <form action="update.php" method="post" class="formulario">
            
            <input type="hidden" name="txtId" value="<?php echo $cliente->id; ?>">

            <label for="txtCpf">CPF</label>
            <input type="text" name="txtCpf" id="txtCpf" value="<?php echo $cliente->cpf; ?>">

            <label for="txtNome">Nome do Cliente</label>
            <input type="text" name="txtNome" id="txtNome" value="<?php echo $cliente->nome; ?>">

            <label for="txtEmail">E-mail</label>
            <input type="email" name="txtEmail" id="txtEmail" value="<?php echo $cliente->email; ?>">

            <label for="txtFone">Telefone</label>
            <input type="tel" name="txtFone" id="txtFone" value="<?php echo $cliente->fone; ?>">

            <label for="txtDataNasc">Data de Nascimento</label>
            <input type="date" name="txtDataNasc" id="txtDataNasc" value="<?php echo $cliente->data_nascimento; ?>">

            <label for="txtCidade">Cidade</label>
            <input type="text" name="txtCidade" id="txtCidade" value="<?php echo $cliente->cidade; ?>">

            <label>Sexo</label>
            
            <div>
                <input type="radio" name="txtSexo" id="txtSexoM" value="M" <?php if ($cliente->sexo == 'M') { echo 'checked'; } ?> >
                <label for="txtSexoM">Masculino</label>

                <input type="radio" name="txtSexo" id="txtSexoF" value="F" <?php if ($cliente->sexo == 'F') { echo 'checked'; } ?> >
                <label for="txtSexoF">Feminino</label>
            </div>

            <label for="txtRenda">Renda</label>
            <input type="text" name="txtRenda" id="txtRenda" value="<?php echo $cliente->renda; ?>">

            <label for="txtSenha">Senha</label>
            <input type="password" name="txtSenha" id="txtSenha">

            <div style="margin-top: 20px">
                <input type="checkbox" name="txtBloqueado" id="txtBloqueado" <?php if ($cliente->bloqueado == 1) { echo 'checked'; } ?> >
                <label for="txtBloqueado">Bloqueado</label>
            </div>
            
            <label for="txtObs">Observações</label>
            <textarea name="txtObs" id="txtObs"><?php echo $cliente->obs; ?></textarea>

            <button type="submit">Salvar</button>
        </form>
    </main>

</body>
</html>