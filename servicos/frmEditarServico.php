<?php
    include '../conexao/conexao.php';
    
    //recuperar o valor do id passado ao programa pelo método GET
    $id = $_GET['id']; 

    //recuperar o registro no banco de dados
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT descricao, componentes, custo FROM servicos WHERE id=?;";
    $query = $pdo->prepare($sql); 
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC); 
    $descricao = $dados['descricao']; 
    $componentes = $dados['componentes']; 
    $custo = $dados['custo']; 
    Conexao::desconectar(); 

?>

    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>
            <div class="titulo">Editar Informações do Serviço</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/editarServico.php" method="POST" id="frmEditar" name="frmEditar" class="needs-validation">
        <div class = "form-row">
            <div class="col-md-2 mb-3 text-white">
                <label for="lblID">Código: <?php echo $id;?> </label>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col md-12 md-3 form-group text-white">
                <label for="txtDescricao">Decrição</label>
                <input class="form-control" id="txtDescricao" name="txtDescricao" value="<?php echo $descricao;?>" placeholder="Descreva qual é o problema"></input>
            </div>
        </div>
            
        <div class = "form-row">
            <div class="col md-9 mb-3 form-group text-white">
                <label for="txtComponentes">Componentes Estragados (opcional)</label>
                <input type="text" class="form-control" id="txtComponentes" name="txtComponentes" value="<?php echo $componentes;?>" placeholder="Caso tenha estragado um componente, descreva quais são eles" ></input>
            </div>

            <div class="col-md-3 mb-3 form-group text-white">
                <label for="txtCusto">Custo do Conserto (opcional)</label>
                <input type="number" class="form-control" id="txtCusto" name="txtCusto" value="<?php echo $custo;?>" placeholder="Caso tenha que consertar um componente, informe os custo" ></input>
            </div>
        </div>


        <br>
        <button class="btn btn-outline-danger"onclick="JavaScript:location.href='../servico/listarServicos.php'">Voltar</button>
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Editar Serviço</button>
    </form>


    <?php require "../footer.php";?>