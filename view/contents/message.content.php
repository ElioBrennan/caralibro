<?php
if (isset($_GET["from"]) && isset($_GET["to"])) {
    $user_from = UsersController::getUserByID($_GET["from"])[0];
    $user_to = UsersController::getUserByID($_GET["to"])[0];
    $privates = PrivatesController::getPrivateMessages($user_from["id"], $user_to["id"]);
}
?>

<div class="container">
    <h4>Mensajes privados</h4>
    <div class="container" style="overflow-y: scroll; height: 150px">
        <?php foreach ($privates as $key => $value) : ?>
            <h5># <?php echo ($key+1) ?> <?php echo UsersController::getUserByID($value["user"])[0]["name"] ?> (<i><?php echo $value["date"] ?></i>)</h5>
            <p><?php echo $value["message"] ?></p>
        <?php endforeach ?>
    </div>
    <br>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre:</label>
                <input readonly type="text" class="form-control" value="<?php echo ($user_to["name"] . " " . $user_to["surname"]) ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="name">Para:</label>
                <input type="hidden" name="idFrom" value="<?php echo ($user_from["id"]) ?>">
                <input type="hidden" name="idTo" value="<?php echo ($user_to["id"]) ?>">
                <textarea class="form-control" name="idMessage"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
        <?php
        $response = PrivatesController::manageSend();
        if ($response == "OK") {
            echo '<script type="text/javascript">
                window.location = "index.php";
            </script>';
        }
        ?>
    </form>
</div>