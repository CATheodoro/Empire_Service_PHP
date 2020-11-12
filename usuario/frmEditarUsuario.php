<?php
        include '../conexao/conexao.php';

        $id = $_GET['id']; 

        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "SELECT nome, email, senha, idFuncao FROM usuario WHERE id=?";
        $query = $pdo->prepare($sql); 
        $query->execute (array($id));
        $dados = $query->fetch(PDO::FETCH_ASSOC); 
        $nome = $dados['nome']; 
        $email = $dados['email']; 
        $senha = $dados['senha']; 
        $funcao = $dados['idFuncao']; 

        $sql = "SELECT * FROM funcao ORDER BY descricaoFuncao;";
        $listarFuncao = $pdo->query($sql);

        Conexao::desconectar();
        
    ?>

    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
        if ($_SESSION['idFuncao'] != 1){
            header("location:../home/home.php");
        }
    ?>

            <div class="titulo">Editar Usuário</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/editarUsuario.php" method="POST" id="frmCadastrar" name="frmCadastrar" class="needs-validation">

        <div class="form-row">
            <div class="col-md-4 mb-3 text-white">
                <label for="id">ID: <?php echo $id; ?></label>
                <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-9 mb-3 text-white">
                <label for="lblDescricao">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome?>" placeholder="Informe o nome" required>
            </div>

            <div class="col-md-3 mb-3 text-white">
                <label for="funcao">Selecione uma Função</label>
                <select type="text" class="form-control" id="funcao" name="funcao" value="$nome" required>
                    <option disabled selected>Selecione uma Função</option>
                    <?php 
                        foreach ($listarFuncao as $funcao){
                    ?>
                        <option value="<?php echo $funcao['id'];?>" selected><?php echo $funcao['descricaoFuncao'];?></option>    
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>


        <div class="form-row">
            <div class="col-md-6 mb-3 text-white">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email"  value="<?php echo $email?>" placeholder="Informe o email" required>
            </div>
            <div class="col-md-6 mb-3 text-white">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha?>" placeholder="Informe o senha" required>
            </div>
        </div>

        
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Editar usuário</button>
    
        
        </form>
        
        <?php require "../footer.php";?>