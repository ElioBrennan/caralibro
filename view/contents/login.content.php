<form method="post">

    <div class="form-group">
        <label for="email">Correo electrónico:</label>
        <input type="email" class="form-control" id="email" name="idEmail">
    </div>

    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="idPassword">
    </div>

    <?php
    $login = UsersController::makeLogin();
    if ($login == "KO") {
        $_SESSION["logged"] = "KO";
        echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
            </script>';
        if (count($_POST) > 0) {
            echo '<div class="alert alert-warning">Error al intentar acceder. Por favor, revisa el correo electrónico y/o la contraseña.</div>';
        }
    } else if ($login["state"] == "OK") {
        $_SESSION["logged"] = $login["email"];
        echo '<script type="text/javascript">
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
                }
                window.location = "index.php";
            </script>';
        if (count($_POST) > 0) {
            echo '<div class="alert alert-success">El registro se ha completado correctamente.</div>';
        }
    } else {
        $_SESSION["logged"] = "KO";
        echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
            </script>';
        if (count($_POST) > 0) {
            echo '<div class="alert alert-warning">Error al intentar acceder. Por favor, revisa el correo electrónico y/o la contraseña.</div>';
        }
    }
    ?>

    <button type="submit" class="btn btn-primary">Conectarse</button>

</form>