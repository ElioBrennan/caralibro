<?php
if (isset($_SESSION["logged"])) {
    if ($_SESSION["logged"] == "KO") {
        echo '<script type="text/javascript">
                window.location = "index.php?current=login";
            </script>';
        return;
    }
} else {
    echo '<script type="text/javascript">
                window.location = "index.php?current=login";
            </script>';
    return;
}
$users = UsersController::getUsers();
$messages = MessagesController::getAllMessages();

$idUser = '';
?>

<br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Correo electrónico</th>
            <th>Fecha de registro</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $key => $value) : ?>
            <tr>
                <td><?php echo $value["id"] ?></td>
                <td><?php echo $value["name"] ?></td>
                <td><?php echo $value["surname"] ?></td>
                <td><?php echo $value["email"] ?></td>
                <td><?php echo $value["date"] ?></td>
                <td>
                    <?php if ($value["email"] == $_SESSION["logged"]) : ?>
                        <div class="btn-group">
                            <a href="index.php?current=edit&id=<?php echo ($value["id"]) ?>"><button class="btn btn-primary">Editar</button></a>
                            <a href="index.php?current=delete&id=<?php echo ($value["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a>
                            <?php $idUser = $value["id"]; ?>
                        </div>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div>
    <div class="container" style="overflow-y: scroll; height: 150px">
        <?php foreach ($messages as $key => $value) : ?>
            <h5>#<?php echo $value["id"] ?>  <?php echo $value["user"] ?> (<i><?php echo $value["date"] ?></i>)</h5>
            <p><?php echo $value["message"] ?></p>
        <?php endforeach ?>
    </div>

    <br>
    <form method="post">
        <textarea class="form-control" name="idMessage"></textarea>
        <input type="hidden" value="<?php echo ($idUser) ?>" name="idUser">
        <br><button class="btn btn-primary" type="submit">Enviar mensaje</button>
        <?php
        $response = MessagesController::managePublic();
        if ($response == "OK") {
            echo '<script type="text/javascript">
                window.location = "index.php";
            </script>';
        }
        ?>
    </form>
</div>