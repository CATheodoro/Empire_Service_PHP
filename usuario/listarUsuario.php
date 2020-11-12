<?php
    include '../conexao/conexao.php';
    $pdo = Conexao::conectar();
    $sql = "SELECT u.id, u.nome, u.email, f.descricaoFuncao FROM usuario u INNER JOIN funcao f WHERE u.idFuncao=f.id";
    $listaUsuario = $pdo->query($sql);
?>

<?php
        require "../header.php";
        require "../sideBar/sidebar.php";
        if ($_SESSION['idFuncao'] != 1){
            header("location:../home/home.php");
        }
?>

            <div class="titulo">Usuários</div>
            <div class="info">
                <br>
                <br>

    <button type="button" onclick="JavaScript:location.href='../usuario/frmCadastrarUsuario.php'" class="btn btn-outline-primary">Cadastrar Novo Usuario</button>
    <br>
    <br>

    <table class = "table table-striped table-dark">
        <tr class="thead-dark">
            <th>Código</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Função</th>
            <th></th>
        </tr>
        <?php foreach($listaUsuario as $usuario){ ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['descricaoFuncao']; ?></td>

                <td><div class="row">
                        <a href="#" onclick="JavaScript:location.href='../usuario/frmEditarUsuario.php?id=<?php echo $usuario['id'];?>'"> <i class="material-icons">edit_road</i></a>
                    </div> 
                </td>
                
            </tr>
        <?php }?>

    </table>
   

<?php require "../footer.php";?>