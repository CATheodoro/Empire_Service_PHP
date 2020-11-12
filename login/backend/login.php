<?php

    $email = trim($_POST['email']);
    $senha = md5(trim($_POST['senha']));


    if (!empty($email) && !empty($senha)){
        include ('../../conexao/conexao.php');
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuario u INNER JOIN funcao f WHERE u.email LIKE ? AND u.idFuncao=f.id";
        $query = $pdo->prepare($sql);
        $query->execute(array($email));
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        Conexao::desconectar();
    }

    if ($senha == $dados['senha']){

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $dados['nome'];
        $_SESSION['idFuncao'] = $dados['idFuncao'];
        header("location:../../servicos/listarServicos.php");
    }
    else{
        header("location:../frmLogar.php");
    }
    

?>