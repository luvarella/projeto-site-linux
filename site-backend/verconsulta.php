<?php
include ('conex.php');

if(isset($_GET['id_consulta']))
{
$query = "SELECT * FROM consulta WHERE id_consulta='".$_GET['id_consulta']."'";
}
else die("Erro: não foi possível achar a consulta");

$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
while ($obj = mysqli_fetch_assoc($resultado))
{
$cpf_paciente = $obj['cpf_paciente'];
$cpf_medico = $obj['cpf_medico'];
$id_consulta = $obj['id_consulta'];
$dt_consulta = $obj['dt_consulta'];
}
?>

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
   <link href="css/deletar.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;500;600;700&display=swap" rel="stylesheet">
   <script src="js/abrirfechar.js"> </script>
</head>
<body>
  <div id="esmaecer"></div>
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
<main>
  <section id = "dados">
    <h2>Dados da consulta</h2>
    <div class = "dados">
	<?php
$query_paciente = "SELECT * FROM paciente WHERE cpf='".$cpf_paciente."'";
$res_paciente = mysqli_query($db, $query_paciente) or die(mysqli_error($db));
while ($obj = mysqli_fetch_assoc($res_paciente))
{
$nome_paciente = $obj['nome'];
}

$query_medico = "SELECT * FROM medico WHERE cpf='".$cpf_medico."'";
$res_medico = mysqli_query($db, $query_medico) or die(mysqli_error($db));
while ($obj = mysqli_fetch_assoc($res_medico))
{
$nome_medico = $obj['nome'];
$esp_medico = $obj['especialidade'];
}
	?>
	<h4>Nome do paciente:</h4>
	<p><?php echo $nome_paciente?></p>
      <h4>CPF do paciente:</h4>
      <p><?php echo $cpf_paciente?></p>
	<h4>Nome do médico:</h4>
	<p><?php echo $nome_medico;
		echo ' ('.$esp_medico.')'; ?></p>
      <h4>CPF do médico:</h4>
      <p><?php echo $cpf_medico?></p>
      <h4>Data da consulta:</h4>
      <p><?php
	$a = explode("-", $dt_consulta);
	echo $a[2].'/'.$a[1].'/'.$a[0];
	?></p><!--
      <h4>Hora da consulta:</h4>
      <p>{Resposta}</p>-->
    </div>
  </section>
  <section>
    <figure class="img">
      <img src="img/img6.png" alt="figura ilustrativa de um médico."/>
    </figure>
    <div class = "botao" >
    <a href = "alterardados.php?id_consulta=<?php echo $id_consulta ?>">
    <input id="enviar" type="submit" value="Alterar Dados" style="margin-bottom: 0;"/>
    </a>
    </div>
    <div class = "botao">
    <a href="javascript:deletarconta()"><input id="enviar" type="submit" value="Cancelar consulta"/></a>
    <!-- <a href = "javascript:deletarconta()">
    <input id="enviar" type="submit" value="Deletar conta" />
    </a> -->
    </div>
  </section>
</main>
<section id="deletar">
 <div>
    <h4 style = "text-align: center;">Tem certeza que deseja cancelar esta consulta?</h4>
    <p style = "text-align: center; width: 363px; margin: 0 auto; margin-top: 15px;">Não será possível a recuperação dos seus dados após esta operação.</p>
   <!-- <h3><a href="javascript:fechar()">x</a></h3> -->
      <div class="botaodeletar">
        <div>
        <a href = "deletar.php?id_consulta=<?php echo $id_consulta ?>">
        <input type="submit" value="Continuar" id="botao1"/>
        </a>
        </div>
        <div>
        <a href="javascript:fechar()">
        <input type="submit"  value="Cancelar" id="botao2" />
        </a>
        </div>
      </div>

</section>
<footer>
  <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
</footer>
</body>

</html>
