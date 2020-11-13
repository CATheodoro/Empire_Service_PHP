<?php
    include '../conexao/conexao.php';
    
    //recuperar o valor do id passado ao programa pelo método GET
    $id = $_GET['id']; 

    //recuperar o registro no banco de dados
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT s.idComputador,c.descricaoCom, l.descricaoLab, s.descricao, s.componentes, s.custo 
    FROM servicos s 
    INNER JOIN computador c 
    INNER JOIN laboratorio l 
    WHERE s.id=? AND s.idComputador = c.id AND s.idLaboratorio = l.id;";

    $query = $pdo->prepare($sql); 
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC); 
    $idComputador = $dados['idComputador'];
    $descricaoLab = $dados['descricaoLab']; 
    $descricaoCom = $dados['descricaoCom']; 
    $descricao = $dados['descricao']; 
    $componentes = $dados['componentes']; 
    $custo = $dados['custo']; 
    Conexao::desconectar(); 

?>

    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>
            <div class="titulo">Concluir Serviço</div>
            <div class="info">



<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">

    <form action="backend/concluirServico.php" method="POST" id="frmEditar" name="frmEditar" class="needs-validation">
        <div class="form-row">
            <div class="col-md-2 mb-3 text-white">
                <label for="lblID">Código: <?php echo $id;?> </label>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </div>
                <div class="col-md-2 mb-3 text-white">
                <label for="lblID">Código Computador: <?php echo $idComputador;?> </label>
                <input type="hidden" id="idComputador" name="idComputador" value="<?php echo $idComputador;?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3 form-group text-white">
                <label for="txtDescricao">Computador</label>
                <input class="form-control" id="txtDescricaoCom" name="txtDescricaoCom" value="<?php echo $descricaoCom;?>" disabled></input>
            </div>

            <div class="col-md-6 mb-3 form-group text-white">
                <label for="txtDescricao">Laboratório</label>
                <input class="form-control" id="txtDescricaoLab" name="txtDescricaoLab" value="<?php echo $descricaoLab;?>" disabled></input>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-12 mb-3 form-group text-white">
                <label for="txtDescricao">Decrição</label>
                <input class="form-control" id="txtDescricao" name="txtDescricao" value="<?php echo $descricao;?>"></input>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-9 mb-3 form-group text-white">
                <label for="txtComponentes">Componentes Estragados</label>
                <input type="text" class="form-control" id="txtComponentes" name="txtComponentes" value="<?php echo $componentes;?>"></input>
            </div>
            <div class="col-md-3 mb-3 form-group text-white">
                <label for="txtCusto">Custo do Conserto</label>
                <input type="number" class="form-control" id="txtCusto" name="txtCusto" value="<?php echo $custo;?>"></input>
            </div>
        </div>


        <br>
        <button class="btn btn-outline-danger" onclick="JavaScript:location.href='../servico/listarServicos.php'">Voltar</button>
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Concluir</button>
    </form>


    <?php require "../footer.php";?>