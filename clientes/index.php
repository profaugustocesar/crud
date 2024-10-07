<?php
    require_once '../core/conexao.php';

    $select = $pdo->prepare('SELECT * FROM clientes'); 
    $select->execute();

    $clientes = $select->fetchAll();

    /*
    echo '<pre>';
    print_r($clientes);
    echo '</pre>';
    */
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
                
                <tr>
                    <td>000.000.000-00</td>
                    <td>Augusto César</td>
                    <td>Surubim</td>
                    <td class="operacoes">
                        <a href="#">Editar</a>
                        <a href="#">Deletar</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
    </main>

</body>
</html>