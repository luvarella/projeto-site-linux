<html>
	<?php
	include('conex.php');
	?>
	<body>
	<?php
	$query = "DELETE FROM consulta WHERE id_consulta='".$_GET['id_consulta']."'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	?>
	<script type="text/javascript">
		alert("Successfully Deleted.");
		window.location = "consultas.php";
	</script>
	</body>
</html>
