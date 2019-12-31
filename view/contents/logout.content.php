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
?>

<h1>¡Hasta otra!</h1>
<p>Se te redirigirá a la pantalla de login en breves.</p>
<?php
    echo 
    '<script type="text/javascript">
        setTimeout(function() {
            window.location = "index.php";
        }, 2500);
    </script>';
?>

<?php session_destroy(); ?>