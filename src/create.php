<?php

require_once "connection.php";

?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Criar usuario</title>
        <?php include "head.php"; ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h2>Criar usuario</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="name" class="form-control" value="" maxlength="50" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" maxlength="30" required>
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="mobile" name="mobile" class="form-control" value="" maxlength="12" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="save" value="Salvar">
                        <a href="index.php"  class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>