<?php

try{
    if ( $_SERVER['REQUEST_METHOD'] !== 'POST'){
        throw new Exception('Metodo nao suportado', 405);
    }
    
    $conexao = mysqli_connect("localhost", "root", "jsontest", "agenda");
    
    if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());}
    
    $nome = $_POST['nome'];
    $stmt = mysqli_prepare($conexao, "SELECT Telefone FROM `agenda_telefonica` WHERE Nome =?");
    mysqli_stmt_bind_param($stmt, "s", $nome);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $dados);
    mysqli_stmt_fetch($stmt);
    
    print json_encode($dados);
    
    mysqli_stmt_close($stmt);
    
} catch (Exception $e) {
    echo $e->getMessage();
}
