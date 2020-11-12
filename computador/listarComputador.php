<?php //ListarLaboratorio.php
    include '../conexao/conexao.php';
    $pdo = Conexao::conectar();
    $sql = "SELECT c.id,c.descricaoCom,l.descricaoLab,s.descricaoStatus FROM computador c INNER JOIN laboratorio l INNER JOIN status s WHERE c.idLaboratorio=l.id and c.idStatus = s.id";
    $listarComputadores = $pdo->query($sql);
    
?>

<?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>
            <div class="titulo">Computador</div>
            <div class="info">
            <br>
            <br>

    <button type="button" onclick="JavaScript:location.href='../computador/frmCadastrarComputador.php'" class="btn btn-outline-primary">Cadastrar Novo Computador</button>
            <br>
            <br>

    <table class = "table table-striped table-dark">
        <tr class="thead-dark">
            <th>Código</th>
            <th>Descrição</th>
            <th>Laboratório</th>
            <th>Status</th>
            <th></th>
            

        </tr>
        <?php foreach($listarComputadores as $computadores){ ?>
            <tr>
                <td><?php echo $computadores['id']; ?></td>
                <td><?php echo $computadores['descricaoCom']; ?></td>
                <td><?php echo $computadores['descricaoLab']; ?></td>
                <td><?php echo $computadores['descricaoStatus']; ?></td>
                <td> <div>
                    <a href="#" onclick="JavaScript:location.href='frmEditarComputador.php?id=<?php echo $computadores['id'];?>'"><i class="material-icons">edit_road</i></a>
                    <a href="#" class="remover" onclick="removerCom();"> <i class="material-icons">delete</i></a>
                    </div>
                </td>
            </tr>
        <?php }?>

    </table>

            <script>
                
                function removerCom(){
                    var remover = confirm("Deseja remover <?php echo $computadores['descricaoCom'] ?>");
                    if (remover){
                        JavaScript:location.href='../computador/backend/removerComputador.php?id=<?php echo $computadores['id']; ?>'
                    }
                    
                };
            </script>
            
<?php require "../footer.php";?>
