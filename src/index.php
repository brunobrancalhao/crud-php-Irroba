<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8"/>
        <title>Listando usuarios</title>
        <?php include "head.php"; ?>
        <script>
            $(document).ready(function() {
                $('[data-toogle="tooltip"]').tooltip();
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="page-header clearfix">
                        <a href="create.php" class="btn btn-success pull-right"> Adicionar novo usuario</a>
                    </div>
                    <?php
                        require_once 'connection.php';
                        $results = mysqli_query($conn, "SELECT * FROM users");
                    ?>

                    <?php
                        if(mysqli_num_rows($results) > 0) {
                    ?>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td>Nome</td>
                                <td>Email</td>
                                <td>Celular</td>
                                <td>Ação</td>
                            </tr>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_array($results)) {
                            ?>
                            <tr>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['mobile']; ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id'];?>" title="Atualizar"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="delete.php?id=<?php echo $row['id'];?>" title="Deletar"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php
                                    $i++;
                                }
                            ?>
                        </table>
                        <?php
                            } else {
                                echo "Nenhum resultado";
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>