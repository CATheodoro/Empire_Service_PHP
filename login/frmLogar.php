
<?php include '../header.php'?>

    <div id="login">
        <h3 class="text-center text-white pt-5">Empire Controller</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form needs-validation"  action="../login/backend/login.php" method="POST">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">

                                <label for="email" class="text-info">E-mail:</label><br>
                                <input type="email" name="email" id="email" placeholder="Informe seu E-mail" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="text-info">Senha</label><br>
                                <input type="password" name="senha" id="senha" placeholder="Insira a sua senha" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="btnEntrar" class="btn btn-info btn-md" value="Entrar">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include '../footer.php'?>