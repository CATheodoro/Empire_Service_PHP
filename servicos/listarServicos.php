<?php

    include '../conexao/conexao.php';
    $pdo = Conexao::conectar();
    $sql = "SELECT s.id, s.idComputador, c.descricaoCom, l.descricaoLab, s.dataAbertura, s.dataFechamento, status.descricaoStatus
            FROM servicos s 
            INNER JOIN computador c 
            INNER JOIN laboratorio l 
            INNER JOIN status 
            WHERE s.idComputador = c.id 
            AND s.idLaboratorio = l.id 
            AND s.idStatus = status.id;";
    $listarServico = $pdo->query($sql);
?>

<?php
        require "../header.php";
        require "../sideBar/sidebar.php";
?>

            <div class="titulo">Serviços</div>
            <div class="info">
                <br>
                <br>

    <button type="button" onclick="JavaScript:location.href='../servicos/frmCadastrarServicos.php'" class="btn btn-outline-primary">Criar Novo Serviço</button>
    <br>
    <br>

    <table class = "table table-striped table-dark">
        <tr class="thead-dark">
            <th>Código</th>
            <th>Id PC</th>
            <th>Computador</th>
            <th>Laboratório</th>
            <th>Data Abertura</th>
            <th>Data Fechamento</th>
            <th>Status</th>
            <th></th>
        </tr>
        <?php foreach($listarServico as $servicos){ ?>
            <tr>
                <td><?php echo $servicos['id']; ?></td>
                <td><?php echo $servicos['idComputador']; ?></td>
                <td><?php echo $servicos['descricaoCom']; ?></td>
                <td><?php echo $servicos['descricaoLab']; ?></td>
                <td><?php echo $servicos['dataAbertura']; ?></td>
                <td><?php echo $servicos['dataFechamento']; ?></td>
                <td><?php echo $servicos['descricaoStatus']; ?></td>
                <td><div class="row">
                        <a href="#" onclick="JavaScript:location.href='../servicos/frmEditarServico.php?id=<?php echo $servicos['id'];?>'"> <i class="material-icons">edit_road</i></a>
                        <a href="#" class="concluir" onclick="location.href='../servicos/frmConcluirServico.php?id=<?php echo $servicos['id'];?>&?idComputador=<?php echo $servicos['idComputador'];?>'"> <i class="material-icons">done</i></a>
                    </div> 
                </td>
                
            </tr>
        <?php }?>

    </table>
   

<?php require "../footer.php";?>