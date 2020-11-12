<?php 
    include '../../conexao/conexao.php';

    $id = trim($_GET['id']);

    if(!empty($id)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM computador WHERE id=?";
        $query = $pdo->prepare($sql);
        $query-> execute(array($id));
        Conexao::desconectar();
    }
    header("location:../listarComputador.php");

?>