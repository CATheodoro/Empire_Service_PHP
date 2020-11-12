<?php 
    include '../../conexao/conexao.php';

    
    $id = trim($_POST['id']);
    $idComputador = trim($_POST['idComputador']);
    $descriaco = trim($_POST['txtDescricao']); 
    $componentes = trim($_POST['txtComponentes']); 
    $custo = trim($_POST['txtCusto']); 

    if(!empty($id)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE servicos SET idStatus=?, dataFechamento=sysdate(), descricao=?, componentes=?, custo=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array(2, $descriaco, $componentes, $custo, $id));

        $sql = "UPDATE computador SET idStatus=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array(2,$idComputador));
        Conexao::desconectar();
    }
    header("location:../listarServicos.php");

?>