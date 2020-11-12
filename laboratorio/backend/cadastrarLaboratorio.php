<?php //cadastrarLaboratorio.php
    include '../../conexao/conexao.php';

    //RECUPERAR DADOS
    $descricao = trim($_POST['txtDescricao']);


    if(!empty($descricao)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO laboratorio (descricaoLab) VALUES (?);";
        $query = $pdo->prepare($sql);
        $query->execute (array($descricao));
        conexao::desconectar();
    }
    header("location:../../laboratorio/listarLaboratorio.php");
?>