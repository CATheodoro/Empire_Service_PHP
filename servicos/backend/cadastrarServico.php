<?php
    include '../../conexao/conexao.php';

    //RECUPERAR DADOS
    $idLaboratorio = trim($_POST['lblLaboratorio']);
    $idComputador = trim($_POST['lblComputador']);
    $txtDescricao = trim($_POST['txtDescricao']);
    $txtComponentes = trim($_POST['txtComponentes']);
    


    if(!empty($idComputador) && !empty($idLaboratorio)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO servicos (idComputador, idLaboratorio, dataAbertura, dataFechamento, idStatus, descricao, componentes, custo) VALUES (?,?,sysdate(),null,?,?,?,null);";
        $query = $pdo->prepare($sql);
        $query->execute (array($idComputador, $idLaboratorio, 3, $txtDescricao, $txtComponentes));
        
        $sql = "UPDATE computador SET idStatus=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array(3,$idComputador));

        conexao::desconectar();
    }
    header("location:../../servicos/listarServicos.php");

?>