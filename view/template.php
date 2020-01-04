<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<?php
	if (!isset($_GET["current"])) {
		echo ('<title>CaraLibro - Página principal</title>');
	} else {
		switch ($_GET["current"]) {
			case "login":
				echo ('<title>CaraLibro - Acceso</title>');
				break;
			case "register":
				echo ('<title>CaraLibro - Registro</title>');
				break;
			case "logout":
				echo ('<title>CaraLibro - Desconexión</title>');
				break;
			case "edit":
				echo ('<title>CaraLibro - Editar información</title>');
				break;
			case "delete":
				echo ('<title>CaraLibro - Eliminar usuario</title>');
				break;
			case "message":
				echo ('<title>CaraLibro - Contactar con un usuario</title>');
				break;
			default:
				echo ('<title>CaraLibro - Página principal</title>');
				break;
		}
	}
	?>
</head>

<body>
	<!-- NAVBAR -->
	<div class="container-fluid">
		<img class="img-fluid py-3 rounded mx-auto d-block" src="view/resources/top_image.png" alt="logo">
	</div>

	<div class="container-fluid bg-dark">
		<div class="container">
			<ul class="nav nav-justified py-2 nav-pills">

				<?php if (!isset($_GET["current"])) : ?>
					<li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
				<?php else : ?>
					<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
				<?php endif ?>

				<?php if (!isset($_SESSION["logged"])) : ?>
					<?php if (isset($_GET["current"])) : ?>
						<?php if ($_GET["current"] == "login") : ?>
							<li class="nav-item"><a class="nav-link active" href="index.php?current=login">Conexión</a></li>
						<?php else : ?>
							<li class="nav-item"><a class="nav-link" href="index.php?current=login">Conexión</a></li>
						<?php endif ?>
					<?php else : ?>
						<li class="nav-item"><a class="nav-link" href="index.php?current=login">Conexión</a></li>
					<?php endif ?>
				<?php elseif ($_SESSION["logged"] == "KO") : ?>
					<?php if (isset($_GET["current"])) : ?>
						<?php if ($_GET["current"] == "login") : ?>
							<li class="nav-item"><a class="nav-link active" href="index.php?current=login">Conexión</a></li>
						<?php else : ?>
							<li class="nav-item"><a class="nav-link" href="index.php?current=login">Conexión</a></li>
						<?php endif ?>
					<?php else : ?>
						<li class="nav-item"><a class="nav-link" href="index.php?current=login">Conexión</a></li>
					<?php endif ?>
				<?php endif ?>

				<?php if (!isset($_SESSION["logged"])) : ?>
					<?php if (isset($_GET["current"])) : ?>
						<?php if ($_GET["current"] == "register") : ?>
							<li class="nav-item"><a class="nav-link active" href="index.php?current=register">Registro</a></li>
						<?php else : ?>
							<li class="nav-item"><a class="nav-link" href="index.php?current=register">Registro</a></li>
						<?php endif ?>
					<?php else : ?>
						<li class="nav-item"><a class="nav-link" href="index.php?current=register">Registro</a></li>
					<?php endif ?>
				<?php elseif ($_SESSION["logged"] == "KO") : ?>
					<?php if (isset($_GET["current"])) : ?>
						<?php if ($_GET["current"] == "register") : ?>
							<li class="nav-item"><a class="nav-link active" href="index.php?current=register">Registro</a></li>
						<?php else : ?>
							<li class="nav-item"><a class="nav-link" href="index.php?current=register">Registro</a></li>
						<?php endif ?>
					<?php else : ?>
						<li class="nav-item"><a class="nav-link" href="index.php?current=register">Registro</a></li>
					<?php endif ?>
				<?php endif ?>

				<?php if (isset($_SESSION["logged"])) : ?>
					<?php if ($_SESSION["logged"] != "KO") : ?>
						<?php if (isset($_GET["current"])) : ?>
							<?php if ($_GET["current"] == "logout") : ?>
								<li class="nav-item"><a class="nav-link active" href="index.php?current=logout">Desconexión</a></li>
							<?php else : ?>
								<li class="nav-item"><a class="nav-link" href="index.php?current=logout">Desconexión</a></li>
							<?php endif ?>
						<?php else : ?>
							<li class="nav-item"><a class="nav-link" href="index.php?current=logout">Desconexión</a></li>
						<?php endif ?>
					<?php endif ?>
				<?php endif ?>

			</ul>
		</div>
	</div>

	<!-- CONTENT -->
	<div class="container-fluid">
		<div class="container py-5">
			<?php
			if (!isset($_GET["current"])) {
				include('view/contents/index.content.php');
			} else {
				if (
					$_GET["current"] == 'login'
					|| $_GET["current"] == 'register'
					|| $_GET["current"] == 'logout'
					|| $_GET["current"] == 'edit'
					|| $_GET["current"] == 'delete'
					|| $_GET["current"] == 'message'
				) {
					include('view/contents/' . $_GET["current"] . '.content.php');
				} else {
					include('view/contents/404.content.php');
				}
			}
			?>
		</div>
	</div>

</body>

</html>