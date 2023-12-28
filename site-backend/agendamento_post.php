<html>
<?php include ('conex.php'); ?>
<body>

<?php
	$cpf_paciente = $_POST['cpf_paciente'];
	$cpf_medico = $_POST['cpf_medico'];
	$dt_consulta = $_POST['dt_consulta'];

	$query = "INSERT INTO consulta (cpf_paciente, cpf_medico, dt_consulta)
		VALUES ('".$cpf_paciente."','".$cpf_medico."', '".$dt_consulta."')";
	mysqli_query($db, $query) or die ('Error in Database: '.mysqli_error($db));
?>
<script type="text/javascript">
	alert("Successfully addded.");
	window.location = "consultas.php";
</script>

</body>
</html>
