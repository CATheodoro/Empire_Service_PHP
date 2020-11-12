<?php
    include '../../conexao/conexao.php';
    

    $id = trim($_POST['id']);
    $descriaco = trim($_POST['txtDescricao']);
    $laboratorio = trim($_POST['lblLaboratorio']);

    if(!empty($id) && !empty($descriaco) && !empty($laboratorio)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE computador SET descricaoCom=?, idLaboratorio=? WHERE id=?;";
        $query = $pdo->prepare($sql);
        $query->execute (array($descriaco,$laboratorio,$id));
        Conexao::desconectar();
    }
    
    header("location:../listarComputador.php");
?>
