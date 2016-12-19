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
		<div class="row">
			<div class="span12">
				<h2>POST DATA</h2>
				<pre>
				<?php print_r($_POST); ?>
				</pre>
				<pre>
				<?php echo htmlspecialchars($_POST['content']); ?>
				</pre>
			</div>
		</div>
		<div class="row">
			<form class="span12" id="postForm" action="textarea.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
				<fieldset>
					<legend>Make Post</legend>
					<p class="container">
						<textarea class="input-block-level" id="summernote" name="content" rows="18">
						</textarea>
					</p>
				</fieldset>
				<button type="submit" class="btn btn-primary">Save changes</button>
				<button type="button" id="cancel" class="btn">Cancel</button>
			</form>
		</div>
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
	</body>
</html>
