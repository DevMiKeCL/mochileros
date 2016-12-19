<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Escribir Texto</title>
    <!-- include jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> -->

    <!-- include libraries BS3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>

    <!-- include summernote -->
    <link rel="stylesheet" href="summernote/dist/summernote.css">
    <script type="text/javascript" src="summernote/dist/summernote.js"></script>

    <script src="js/scripts.js"></script>

		<!-- include summernote css/js-->
		<link href="summernote/dist/summernote.css" / rel="stylesheet">
		<script src="summernote/dist/summernote.js"></script>
	<body>
	<div class="container">
		<?php if (!isset($_POST['enviar_texto'])): ?>
			<div class="row">
				<form class="span12" id="postForm" action="textarea.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
					<fieldset>
						<legend>Texto Requerido</legend>
						<p class="container">
							<textarea class="input-block-level" id="summernote" name="content" rows="18" required>
							</textarea>
						</p>
					</fieldset>
					<button type="submit" class="btn btn-primary" name="enviar_texto">Enviar Texto</button>
					<button type="button" id="cancel" class="btn">Cancelar</button>
				</form>
			</div>
		<?php else:
			$mensaje = base64_encode($_POST['content']);
			var_dump($mensaje);
			include 'conexion.php';
			$sql = "INSERT INTO `mensajes` (`mensaje`) VALUES ('$mensaje')";
			echo "mensaje igresado";
			//echo "$article_code";
			// se ejecuta y cierra la bbdd
			$conn->query($sql);
			$conn->close();
			?>

		<?php endif; ?>


	</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#summernote').summernote({
			height: "500px"
		});
	});
	var postForm = function() {
		var content = $('textarea[name="content"]').html($('#summernote').code());
	}
	</script>
	<div class="container">
	<h2>Lista de mensajes</h2>
	<p>mensajes ingresados</p>
	<?php include 'tablam.php'; ?>
</div>
	</body>
</html>
