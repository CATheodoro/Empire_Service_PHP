
        <?php 
            session_start();
            if(!isset($_SESSION['email'])){
                header("location:../index.php");
            }
        ?>

    <div class="warapper">
        <div class="sidebar">
            <h2>Empire Controller</h2>
            <ul>
                <li><a href="../home/home.php"><i class="fas fa-home">Home</i></a></li>
                <li><a href="../laboratorio/listarLaboratorio.php"><i class="fas fa-flask">Laboratório</i></a></li>
                <li><a href="../computador/listarComputador.php"><i class="fas fa-tv">Computadores</i></a></li>
                <li><a href="../servicos/listarServicos.php"><i class="fas fa-key">Serviços</i></a></li>
                <?php if ($_SESSION['idFuncao'] == 1){?>
                    <li><a href="../usuario/listarUsuario.php"><i class="fas fa-user">Usuários</i></a></li>
                <?php }?>
                
            </ul>
        </div>

        <div class="main_content">
            <div class="header">
                EMPIRE SERVICES
                
                <div class="usuario">
                    <?php echo $_SESSION['nome'];?> ||
                    <?php echo $_SESSION['email'];?> 
                    <a type="button" class="btn btn-outline-danger" href="../conexao/logout.php">Log Out</a>
                </div>
            </div>
            


