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

<h1>EXIT</h1>

<?php session_destroy(); ?>