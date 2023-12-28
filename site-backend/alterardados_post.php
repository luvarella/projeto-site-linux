<html>
<?php include('conex.php');?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<?php
	$id_consulta = $_POST['id_consulta'];
	$cpf_paciente = $_POST['cpf_paciente'];
	$cpf_medico = $_POST['cpf_medico'];
	$dt_consulta = $_POST['dt_consulta'];

	$query = 'UPDATE consulta set cpf_paciente ="'.$cpf_paciente.'",
		cpf_medico ="'.$cpf_medico.'",
		dt_consulta ="'.$dt_consulta.'" WHERE
		id_consulta ="'.$id_consulta.'"';
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	?>
	<script type="text/javascript">
		alert("Update successfull");
		window.location = "verconsulta.php?id_consulta=<?php echo $id_consulta; ?>";
	</script>
</body>
</html>
