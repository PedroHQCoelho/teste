<?php

    $usuario = 'root';
    $senha = '';

    try
    {
        $conexao = new PDO('mysql:host=localhost;dbname=todobd', $usuario, $senha);

    }
    catch(PDOExpection $e)
    {
        echo $e->getMessage();
    }

?>