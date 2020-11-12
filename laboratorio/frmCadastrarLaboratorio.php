
    <?php
        require "../header.php";
        require "../sideBar/sidebar.php";
    ?>

            <div class="titulo">Cadastrar Laboratório</div>
            <div class="info">

<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <form action="backend/cadastrarLaboratorio.php" method="POST" id="frmCadastrar" name="frmCadastrar" class="needs-validation">
            
        <div class="form-row">
            <div class="col-md-12 mb-3 text-white">
                <label for="lblDescricao">Nome do Laboratório</label>
                <input type="text" class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Informe o nome do laboratório" required>
            </div>
        <br>
        <button class="btn btn-primary float-right" type="submit" id="btnCadastrar">Cadastrar computador</button>
        
        <?php require "../footer.php";?>