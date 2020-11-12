<?php //ListarLaboratorio.php
    include '../conexao/conexao.php';
    $pdo = Conexao::conectar();
    $sql = "SELECT * FROM laboratorio ORDER by descricaoLab;";
    $listarLaboratorios = $pdo->query($sql);
?>

    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>

            <div class="titulo">Laboratórios</div>
            <div class="info">
                <br>
                <br>
    <button type="button" onclick="JavaScript:location.href='../laboratorio/frmCadastrarLaboratorio.php'" class="btn btn-outline-primary">Cadastrar Novo Laboratório</button>
    <br>
    <br>

    <table class = "table table-striped table-dark">
        <tr class="thead-dark">
            <th>Código</th>
            <th>Nome</th>
            <th></th>
        </tr>
        <?php foreach($listarLaboratorios as $laboratorio){ ?>
            <tr>
                <td><?php echo $laboratorio['id']; ?></td>
                <td><?php echo $laboratorio['descricaoLab']; ?></td>
                <td><div>
                        <a href="#" onclick="JavaScript:location.href='../laboratorio/frmEditarLaboratorio.php?id=<?php echo $laboratorio['id'];?>'"> <i class="material-icons">edit_road</i></a>
                        <a href="#" class="remover" onclick="removerLab();"> <i class="material-icons">delete</i></a>
                    </div> 
                </td>
            </tr>
        <?php }?>

    </table>

            <script>

                function removerLab(){
                    var remover = confirm("Deseja remover <?php echo $laboratorio['descricaoLab']?>?");
                    if (remover){
                        location.href="../laboratorio/backend/removerLaboratorio.php?id=<?php echo $laboratorio['id']; ?>"
                    }
                };
            </script>

<?php require "../footer.php";?>