<?php
    require_once '../core/conexao.php';

    if (isset($_GET['txtBusca'])) {

        $select = $pdo->prepare('SELECT * FROM clientes WHERE nome = :nome');
        $select->bindValue(':nome',$_GET['txtBusca']);

    } else {
        $select = $pdo->prepare('SELECT * FROM clientes'); 
    }

    $select->execute();
    $clientes = $select->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>

    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <header class="cabecalho">
        <h1>CRUD</h1>
    </header>

    <section class="titulo">
        <h2>Listagem de Clientes</h2>
    </section>  

    <section class="busca">
        <form action="index.php" method="get">
            <input type="text" name="txtBusca" placeholder="Buscar Cliente">
            <button type="submit">Buscar</button>
        </form>
    </section>

    <main class="dados">
        <table>
            <thead>
                <th>CPF</th>
                <th>Cliente</th>
                <th>Cidade</th>
                <th>Operações</th>
            </thead>

            <tbody>
                
                <?php foreach ($clientes as $cli) { ?>
                    <tr>
                        <td><?php echo $cli->cpf; ?></td>
                        <td><?php echo $cli->nome; ?></td>
                        <td><?php echo $cli->cidade; ?></td>
                        <td class="operacoes">
                            <a href="#">Editar</a>
                            <a href="#">Deletar</a>
                        </td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </main>
</div>
</body>
</html>