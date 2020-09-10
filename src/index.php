<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Retrieve Or Fetch Data From MySQL Database Using PHP With Boostrap</title>
<?php include "head.php"; ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Lista de Usuario</h2>
                        <a href="create.php" class="btn btn-success pull-right">Adicionar novo Usuario</a>
                    </div>
                   <?php
                    include_once 'connection.php';
                    $result = mysqli_query($conn,"SELECT * FROM users");
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                      <table class='table table-bordered table-striped'>

                      <tr>
                        <td>Nome</td>
                        <td>Email</td>
                        <td>Celular</td>
                        <td>Ação</td>
                      </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td><?php echo ($row["mobile"])?($row["mobile"]):('N/A'); ?></td>
                        <td><a href="update.php?id=<?php echo $row["id"]; ?>" title='Atualizar'><span class='glyphicon glyphicon-pencil'></span></a>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>" title='Deletar'><i class='material-icons'><span class='glyphicon glyphicon-trash'></span></a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
                    </table>
                     <?php
                    }
                    else{
                        echo "Nenhum resultado";
                    }
                    ?>

                </div>
            </div>
        </div>

</body>
</html>