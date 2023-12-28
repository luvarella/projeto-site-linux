<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<?php
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$dt_nasc = $_POST['dt_nasc'];
		$senha = $_POST['senha'];
	
		include('conex.php');
		
		$query = 'UPDATE paciente set nome ="'.$nome.'",
				email ="'.$email.'", telefone="'.$telefone.'",
				dt_nasc="'.$dt_nasc.'", senha="'.$senha.'" WHERE
				cpf ="'.$cpf.'"';
		$result = mysqli_query($db, $query) or die(mysqli_error($db));
							
		?>	

		<script type="text/javascript">
			alert("Update Successfull.");
			window.location = "perfil.php?cpf=<?php echo $cpf; ?>";
		</script>
	</body>
</html>
