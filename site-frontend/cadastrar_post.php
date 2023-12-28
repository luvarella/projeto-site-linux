
<html>
	<?php
	include('conex.php');
	?>   

<body>

	<?php
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$dt_nasc = $_POST['dt_nasc'];
	$cpf = $_POST['cpf'];
	$senha = $_POST['senha'];
				
	$query = "INSERT INTO paciente			(cpf, nome, email, telefone, dt_nasc, senha)
			VALUES ('".$cpf."','".$nome."','".$email."','".$telefone."','$dt_nasc','".$senha."')";
	mysqli_query($db,$query) or die ('Error in Database: '.mysqli_error($db));
					
	?>
	
	<script type="text/javascript">
		alert("Successfully added.");
		window.location = "index.html";
	</script>

</body>

</html>

