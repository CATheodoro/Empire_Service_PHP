    <?php 
        include '../conexao/conexao.php';
        $pdo = Conexao::conectar();
        $sql = "SELECT * FROM laboratorio ORDER BY descricaoLab;";
        $listarLaboratorio = $pdo->query($sql);
        Conexao::desconectar();
    
    ?>


    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>

            <div class="titulo">Cadastrar Computador</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/cadastrarComputador.php" method="POST" id="frmCadastrar" name="frmCadastrar" class="needs-validation">
            
        <div class="form-row">
            <div class="col-md-12 mb-3 text-white">
                <label for="lblDescricao">Nome do Computador</label>
                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Informe o nome do computador" required>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 m-10 text-white">
            <label for="lblLaboratorio">Selecione um Laboratório</label>
                <select name="lblLaboratorio" id="lblLaboratorio" class="form-control">
                <option disabled selected>Selecione um Laboratório</option>
                <?php
                    foreach ($listarLaboratorio as $laboratorio) {?>
                            <option value="<?php echo $laboratorio['id']; ?>"><?php echo $laboratorio['descricaoLab']; ?></option>
                        <?php }
                ?>  
                </select>
            </div>
            <div class="col-md-0 m-10 text-white">
                <input type="text" class="form-control" id="txtStatus" name="txtStatus" value="1" hidden/>
            </div>

        </div>
        <br>
        <button class="btn btn-outline-danger" onclick="JavaScript:location.href='../computador/listarComputador.php'">Voltar</button>
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Cadastrar computador</button>
    </form>

    <?php require "../footer.php";?>