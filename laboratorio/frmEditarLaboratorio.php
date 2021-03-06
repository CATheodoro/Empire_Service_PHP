<?php
    include '../conexao/conexao.php';
    
    //recuperar o valor do id passado ao programa pelo método GET
    $id = $_GET['id']; 

    //recuperar o registro no banco de dados
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT * FROM laboratorio WHERE id=?;";
    $query = $pdo->prepare($sql); 
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC); 
    $descricao = $dados['descricaoLab']; 
    Conexao::desconectar(); 
?>


<?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>

            <div class="titulo">Editar Laboratório</div>
            <div class="info">

    <div class="jumbotron jumbotron-fluid bg-dark">
    <div class="container">
    <form action="backend/editarLaboratorio.php" method="POST" id="frmEditarLab" name="frmEditarLab" class="needs-validation">
            

        <div class="form-row">
            <div class="col-md-2 mb-3 text-white">
                <label for="lblID">Código: <?php echo $id;?> </label>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </div>

            <div class="col-md-10 mb-3 text-white">
                <label for="lblDescricao">Nome do Laboratorio: </label>
                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Alterar Nome do Laboratório" value="<?php echo $descricao;?>">
            </div>
        </div>

        <br>
        <button class="btn btn-outline-danger"onclick="JavaScript:location.href='../laboratorio/listarLaboratorio.php'">Voltar</button>
        <a class="btn btn-danger" onclick="removerLab();"> <i class="material-icons">delete</i></a>
        <button class="btn btn-primary float-right" type="submit" id="btnEditar">Editar</button>
    </form>

    <script>
        function removerLab(){
                var remover = confirm("Deseja remover <?php echo $descricao?>");
                if (remover){
                location.href='../laboratorio/backend/removerLaboratorio.php?id=<?php echo $id?>'
            }
                    
        };
    </script>

<?php require "../footer.php";?>