<!DOCTYPE html>
<html lang = "pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Saúde Mais - Admin</title>
  <link href="css/style.css" rel="stylesheet"/>
  <link href="css/index.css" rel="stylesheet"/>
  <link href="css/cadastro.css" rel="stylesheet"/>
  <link href="css/agendamento.css" rel="stylesheet"/>
  <link href="css/dados.css" rel="stylesheet"/>
  <link href="css/dadosconsulta.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <figure class = "logo">
        <a href="index.html"><img src="img/logo.png" alt="logotipo do Saúde Mais"/></a>
    </figure>
    <nav id = "menu">
        <ul>
          <li><a href = "index.html">Início</a></li>
          <li><a href = "agendamento.php">Agendar</a></li>
          <li><a href = "consultas.php">Ver Consultas</a></li>
        </ul>
        </nav>
  </header>
  <main style = "display: block;">
    <section id = "title">
      <h2>Consultas Agendadas</h2>
      <div class = "linetitle">
      </div>
    </section>
    <section id = "dados">
	<?php include('conex.php');

	$query = 'SELECT * FROM consulta';
	$result = mysqli_query($db, $query) or die (mysqli_error($db));

	while ($row = mysqli_fetch_assoc($result)) {

	$query_paciente = "SELECT * FROM paciente WHERE cpf='".$row['cpf_paciente']."'";
	$res_paciente = mysqli_query($db, $query_paciente) or die(mysqli_error($db));
	while ($obj = mysqli_fetch_assoc($res_paciente)){
	$nome_paciente = $obj['nome'];}

	$query_medico = "SELECT * FROM medico WHERE cpf='".$row['cpf_medico']."'";
	$res_medico = mysqli_query($db, $query_medico) or die(mysqli_error($db));
	while ($obj = mysqli_fetch_assoc($res_medico)){
	$nome_medico = $obj['nome'];}

        echo '<div class = "dados">';
         echo '<h4>Paciente:</h4>';
         echo '<p>'.$nome_paciente.'</p>';
         echo '<h4>Médico:</h4>';
         echo '<p>'.$nome_medico.'</p>';
         echo '<h4>Data da consulta:</h4>';
	 $a = explode("-", $row['dt_consulta']);
         echo '<p>'.$a[2].'/'.$a[1].'/'.$a[0].'</p>';
         echo '<!--<h4>Hora da consulta:</h4><p>{Resposta}</p>-->';
         echo '<div>';
	  echo '<a href = "verconsulta.php?id_consulta='.$row['id_consulta'].'" >';
           echo '<input type="submit" value="Visualizar" id="botarconsulta"/>';
          echo '</a>';
         echo '</div>';
        echo '</div>';
	}
	?>
    </section>
  </main>
  <footer>
    <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
  </footer>
  </body>
  </html>
