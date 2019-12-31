<h3>¿Estás seguro que quieres eliminar tu cuenta de CaraLibro?</h3>

<a href="index.php"><button class="btn btn-primary">No, quiero volver</button></a>
<form method="post">
    <input type="hidden" value="<?php echo($_GET["id"]);?>" name="makeDelete">
    <button class="btn btn-danger">Eliminar</button></a>
    <?php
        $delete = new UsersController();
        $delete -> manageDelete()
    ?>
</form>