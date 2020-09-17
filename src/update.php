<?php

require_once "connection.php";

$result = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_GET['id']."'");
$row = mysqli_fetch_array($result);

if(count($_POST) > 0) {

    if($_POST['name'] == $row['name']) {
        echo "Você deve editar o nome";
        exit();
    }

    $sql = "UPDATE users SET name = '".$_POST['name']."', mobile = '".$_POST['mobile']."', email = '".$_POST['email']."' WHERE id = '".$_POST['id']."'";
    mysqli_query($conn, $sql);

    header("location: index.php");
    exit();
}


if(!$row) {
    echo "Usuario não identificado";
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Atualizando Usuarios</title>
    <?php include "head.php"; ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h2>Atualizar usuario</h2>
                </div>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" maxlength="30" required>
                    </div>
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="mobile" name="mobile" class="form-control" value="<?php echo $row["mobile"]; ?>" maxlength="12" required>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                    <input type="submit" class="btn btn-primary" name="save" value="Salvar">
                    <a href="index.php"  class="btn btn-default">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>