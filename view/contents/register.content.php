<form method="post">

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="idName">
        </div>

        <div class="form-group col-md-6">
            <label for="surname">Apellidos:</label>
            <input type="text" class="form-control" id="surname" name="idSurname">
        </div>
    </div>

    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" class="form-control" id="email" name="idEmail">
    </div>

    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="idPassword">
    </div>

    <?php
    $register = UsersController::manageRegister();
    if ($register == "OK") {

        $_SESSION["logged"] = "OK";

        echo '<script type="text/javascript">
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
            </script>';
        if (count($_POST) > 0) {
            echo '<div class="alert alert-success">El registro se ha completado correctamente.</div>';
        }
    } else {
        echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
            </script>';
        if (count($_POST) > 0) {
            echo '<div class="alert alert-warning">Se ha producido un error durante el registro.</div>';
        }
    }
    ?>

    <button type="submit" class="btn btn-primary">Registrarse</button>

</form>