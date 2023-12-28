<?php
include ('conex.php');

if(isset($_GET['id_consulta'])){
$query = "SELECT * FROM consulta WHERE id_consulta='".$_GET['id_consulta']."'";}
else die("Não foi possível encontrar a consulta");

$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
while($obj = mysqli_fetch_assoc($resultado)){
$cpf_medico = $obj['cpf_medico'];
$cpf_paciente = $obj['cpf_paciente'];
$dt_consulta = $obj['dt_consulta'];
$id_consulta = $obj['id_consulta'];}
?>

<!DOCTYPE html>
<html lang = "pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Saúde Mais - Editar informações</title>
  <link href="css/style.css" rel="stylesheet"/>
  <link href="css/index.css" rel="stylesheet"/>
  <link href="css/cadastro.css" rel="stylesheet"/>
  <link href="css/agendamento.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script>
    function mascara(i){

    var v = i.value;

    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
      i.value = v.substring(0, v.length-1);
      return;
    }

   i.setAttribute("maxlength", "14");
   if (v.length == 3 || v.length == 7) i.value += ".";
   if (v.length == 11) i.value += "-";

    }
    </script>
  <script>
    const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
  }

  const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{2})(\d)/,"($1) $2")
  value = value.replace(/(\d)(\d{4})$/,"$1-$2")
  return value
  }
  </script>
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
          <li><a href = "consultas.php">Ver consultas</a></li>
        </ul>
        </nav>
</header>
<main>
    <section id = "cadastro">
       <form action = "alterardados_post.php" method="post">
      <h2>Editar informações</h2>
	<div hidden class= borda>
		<input oninput="mascara(this)" value="<?php echo $_GET['id_consulta']; ?>" name="id_consulta" id="id_consulta" type="text"/>
	</div>
         <div class = borda>
           <h4>CPF do paciente:</h4>
               <input oninput="mascara(this)" value="<?php echo $cpf_paciente ?>" name="cpf_paciente" id="cpf_paciente" type="text">
         </div>
         <div class = borda>
           <h4>Médico:</h4>
               <select name="cpf_medico" id="cpf_medico">
		<?php
		$query = 'SELECT * FROM medico';
		$result = mysqli_query($db, $query) or die (mysqli_error($db));
		while ($row = mysqli_fetch_assoc($result)) {
		if ($row['cpf'] == $cpf_medico) {
		echo '<option value="'.$row['cpf'].'">'.$row['nome'].'</option>';
		}}
		$res = mysqli_query($db, $query) or die (mysqli_error($db));
		while ($row = mysqli_fetch_assoc($res)) {
		if ($row['cpf'] !== $cpf_medico) {
		echo '<option value="'.$row['cpf'].'">'.$row['nome'].' ('.$row['especialidade'].')</option>';
		}} ?>
	       </select>
         </div>
         <div class = borda>
           <h4>Dia da consulta:</h4>
           <input type="date" value="<?php echo $dt_consulta ?>" id="dt_consulta" name="dt_consulta"/>
         </div>
         <!-- <div class = borda>
           <h4>Registre o dia do agendamento:</h4>
           <input type="date" id="date" required/>
         </div>
         <div class = borda>
           <h4>Selecione a hora da consulta:</h4>
           <select>
             <option value=""></option>
             <option value="hora">9:00h</option>
             <option value="hora">10:00h</option>
             <option value="hora">11:30h</option>
             <option value="hora">14:30h</option>
             <option value="hora">15:30h</option>
             <option value="hora">16:30h</option>
             <option value="hora">17:30h</option>
           </select>
         </div>-->
    </section>
    <section>
    <figure class="img">
      <img src="img/img6.png" alt="figura ilustrativa de uma pessoa acessando dados privados."/>
    </figure>
    <div class = "botao" >
    <a href = "alterardados_post.php">
    <input id="enviar" type="submit" value="Salvar informações" style="margin-bottom: 0; margin-left: 5em;"/>
    </a>
    </div>
    </form>
  </section>
</main>
<footer>
  <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
</footer>
</body>
</html>
