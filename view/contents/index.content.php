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


?>
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
                    <?php if ($value["email"] == $_SESSION["logged"]): ?>
                    <div class="btn-group">
                        <a href="index.php?current=edit&id=<?php echo ($value["id"]) ?>"><button class="btn btn-primary">Editar</button></a>
                        <a href="index.php?current=delete&id=<?php echo ($value["id"]) ?>"><button class="btn btn-danger">Eliminar</button></a>
                    </div>
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>