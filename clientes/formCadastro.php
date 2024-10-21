<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>

    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <header class="cabecalho">
        <h1>CRUD</h1>
    </header>

    <section class="titulo">
        <h2>Cadastro de Clientes</h2>
    </section>  

    <main class="busca">
        <form action="" class="formulario">
            
            <label for="txtCpf">CPF</label>
            <input type="text" name="txtCpf" id="txtCpf">

            <label for="txtNome">Nome do Cliente</label>
            <input type="text" name="txtNome" id="txtNome">

            <label for="txtEmail">E-mail</label>
            <input type="email" name="txtEmail" id="txtEmail">

            <label for="txtFone">Telefone</label>
            <input type="tel" name="txtFone" id="txtFone">

            <label for="txtDataNasc">Data de Nascimento</label>
            <input type="date" name="txtDataNasc" id="txtDataNasc">

            <label for="txtCidade">Cidade</label>
            <input type="text" name="txtCidade" id="txtCidade">

            <label>Sexo</label>
            <input type="radio" name="txtSexo" id="txtSexoM">
            <label for="txtSexoM">Masculino</label>

            <input type="radio" name="txtSexo" id="txtSexoF">
            <label for="txtSexoF">Feminino</label>

            <label for="txtRenda">Renda</label>
            <input type="text" name="txtRenda" id="txtRenda">

            <label for="txtSenha">Senha</label>
            <input type="password" name="txtSenha" id="txtSenha">

            <input type="checkbox" name="txtBloqueado" id="txtBloqueado">
            <label for="txtBloqueado">Bloqueado</label>
            
            <label for="txtObs">Observações</label>
            <textarea name="txtObs" id="txtObs"></textarea>

            <button type="submit">Salvar</button>
        </form>
    </main>

</body>
</html>