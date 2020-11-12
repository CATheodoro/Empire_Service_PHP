<?php // frmEdtPro.php
    include '../../conexao/conexao.php';
    
    //recuperar o valor do id passado ao programa pelo método GET
    $id = trim($_POST['id']);
    $descriaco = trim($_POST['txtDescricao']); 

    if(!empty($id) && !empty($descriaco)){
        $pdo = Conexao::conectar();
        $sql = "UPDATE laboratorio SET descricaoLab=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array($descriaco,$id));
        Conexao::desconectar();
    }
    
    header("location:../listarLaboratorio.php");
?>