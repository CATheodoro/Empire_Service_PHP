<?php
    include '../../conexao/conexao.php';
    
    $id = trim($_POST['id']);
    $descriaco = trim($_POST['txtDescricao']); 
    $componentes = trim($_POST['txtComponentes']); 
    $custo = trim($_POST['txtCusto']); 

    if(!empty($id) && !empty($descriaco)){
        $pdo = Conexao::conectar();
        $sql = "UPDATE servicos SET descricao=?, componentes=?, custo=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array($descriaco, $componentes, $custo ,$id));
        Conexao::desconectar();
    }
    
    header("location:../listarServicos.php");
?>