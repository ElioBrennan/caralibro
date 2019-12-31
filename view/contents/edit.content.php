<?php
if (isset($_GET["id"])) {
    $value = $_GET["id"];
    $user = UsersController::getUserByID($value)[0];
}
?>

<form method="post">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="idName" value=<?php echo $user["name"] ?>>
        </div>

        <div class="form-group col-md-6">
            <label for="surname">Apellidos:</label>
            <input type="text" class="form-control" id="surname" name="idSurname" value=<?php echo $user["surname"] ?>>
        </div>
    </div>

    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="idPassword" value=<?php echo $user["name"] ?>>
    </div>

    <input type="hidden" class="form-control" name="id" value=<?php echo $user["id"] ?>>
    <input type="hidden" class="form-control" name="actualName" value=<?php echo $user["name"] ?>>
    <input type="hidden" class="form-control" name="actualSurname" value=<?php echo $user["surname"] ?>>
    <input type="hidden" class="form-control" name="actualPassword" value=<?php echo $user["password"] ?>>

    <?php
        $update = new UsersController();
        $update->manageUpdate();
    ?>

    <button type="submit" class="btn btn-primary">Actualizar datos</button>

</form>