<?php //cadastrarLaboratorio.php
    include '../../conexao/conexao.php';

    //RECUPERAR DADOS
    $descricao = trim($_POST['txtDescricao']);
    $laboratorio = trim($_POST['lblLaboratorio']);
    $status = trim($_POST['txtStatus']);


    if(!empty($descricao) && $laboratorio != 0){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO computador (descricaoCom,idLaboratorio,idStatus) VALUES (?,?,?);";
        $query = $pdo->prepare($sql);
        $query->execute (array($descricao,$laboratorio,$status));
        conexao::desconectar();
    }
    header("location:../../computador/listarComputador.php");
?>