<?php 
        include '../conexao/conexao.php';
        $pdo = Conexao::conectar();

        $sql = "SELECT * FROM laboratorio ORDER BY descricaoLab;";
        $listarLaboratorio = $pdo->query($sql);
        $sql = "SELECT * FROM computador WHERE idStatus !=3";
        $listarComputador = $pdo->query($sql);
        
        Conexao::desconectar();
    ?>

    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>
            <div class="titulo">Cadastrar Serviço</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/cadastrarServico.php" method="POST" id="frmCadastrar" name="frmCadastrar" class="needs-validation">
            

        <div class="form-row">
            <div class="col-md-12 m-10 text-white">
            <label for="lblLaboratorio">Selecione um Laboratório</label>
                <select name="lblLaboratorio" id="lblLaboratorio" class="form-control">
                <option disabled selected>Selecione um Laboratório</option>
                <?php
                    foreach ($listarLaboratorio as $laboratorio) {?>
                            <option value="<?php echo $laboratorio['id']; $teste = $laboratorio['id'];
                            ?>"><?php echo $laboratorio['descricaoLab']; ?></option>
                    <?php }
                     
                ?>  
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 m-10 text-white">
            <label for="lblLaboratorio">Selecione um Computador</label>
                <select name="lblComputador" id="lblComputador" class="form-control">
                <option disabled selected>Selecione um Computador</option>
                <?php
                    foreach ($listarComputador as $computador) {?>
                            <option value="<?php echo $computador['id']; ?>"><?php echo $computador['descricaoCom']; ?></option>
                        <?php }
                ?>  
                </select>
            </div>
        </div>
        <div class="form-group text-white">
            <label for="txtDescricao">Descrição</label>
            <textarea class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Descreva qual é o problema" rows="3"></textarea>
        </div>
        <div class="form-group text-white">
            <label for="txtComponentes">Componentes Estragados (opcional)</label>
            <textarea class="form-control" id="txtComponentes" name="txtComponentes" placeholder="Caso tenha estragado um componente, descreva quais são eles" rows="3"></textarea>
        </div>
        <br>
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Cadastrar computador</button>
    </form>


    <?php require "../footer.php";?>