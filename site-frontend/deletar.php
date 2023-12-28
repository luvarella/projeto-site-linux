
<html>
	<?php
	include('conex.php');
	?>  

	<body>

	<?php

	$query = "DELETE FROM paciente WHERE cpf='".$_GET['cpf'] ."'";
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
						
	?>
		
	<script type="text/javascript">
		alert("Successfully Deleted.");
		window.location = "index.html";
	</script>				
				
	</body>
</html>
