<?php 
        include '../conexao/conexao.php';


        $id = $_GET['id'];

        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM computador WHERE id=?;";
        $query = $pdo->prepare($sql);
        $query->execute (array($id));
        $dados = $query->fetch(PDO::FETCH_ASSOC);
        
        $descricao = $dados['descricaoCom'];
        $laboratorio = $dados['idLaboratorio'];

        $sql = "SELECT * FROM laboratorio ORDER BY descricaoLab;";
        $listarLaboratorio = $pdo->query($sql);

        Conexao::desconectar();
    
?>


    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>
            <div class="titulo">Editar Computador</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/editarComputador.php" method="POST" id="frmEditarCom" name="frmEditarCom" class="needs-validation">


        <div class="form-row">
            <div class="col-md-2 mb-3 text-white">
                <label for="id">Código: <?php echo $id;?> </label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $id;?>">
            </div>

            <div class="col-md-10 mb-3 text-white">
                <label for="lblDescricao">Nome do Computador</label>
                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" value="<?php echo $descricao ?>" required>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 m-10 text-white">
            <label for="lblLaboratorio">Selecione um Laboratório</label>
                <select name="lblLaboratorio" id="lblLaboratorio" class="form-control">
                    <option disabled>Selecione um Laboratório</option>
                    <?php
                        foreach ($listarLaboratorio as $laboratorio) {?>
                                <option value="<?php echo $laboratorio['id']; ?>" selected><?php echo $laboratorio['descricaoLab']; ?></option>
                            <?php }
                            ?>  
                </select>
            </div>

        </div>

        <br>
        <button class="btn btn-primary float-right" type="submit" id="btnEditar">Editar computador</button>
    </form>

    <?php require "../footer.php";?>