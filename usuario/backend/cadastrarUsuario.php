<?php
    include '../../conexao/conexao.php';

    //RECUPERAR DADOS
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = md5(trim($_POST['senha']));
    $funcao = trim($_POST['funcao']);
    


    if(!empty($nome) && !empty($email) && !empty($senha) && !empty($funcao)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuario (nome, email, senha, idFuncao) VALUES (?,?,?,?);";
        $query = $pdo->prepare($sql);
        $query->execute (array($nome, $email, $senha, $funcao));

        conexao::desconectar();
    }
    header("location:../../usuario/listarUsuario.php");

?>