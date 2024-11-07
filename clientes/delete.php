<?php

    require_once '../core/conexao.php';

    $delete = $pdo->prepare('DELETE FROM clientes WHERE id=:id');
    $delete->bindValue(':id',$_GET['id']);
    $delete->execute();

    header('Location: index.php');