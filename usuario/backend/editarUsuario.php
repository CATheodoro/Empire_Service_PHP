<?php
    include '../../conexao/conexao.php';

    //RECUPERAR DADOS
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = md5(trim($_POST['senha']));
    $funcao = trim($_POST['funcao']);
    


    if(!empty($id) && !empty($nome) && !empty($email) && !empty($senha) && !empty($funcao)){
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario SET nome=?, email=?, senha=?, idFuncao=?  WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute (array($nome, $email, $senha, $funcao, $id));

        conexao::desconectar();
    }
    header("location:../../usuario/listarUsuario.php");

?>