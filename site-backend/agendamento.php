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
          <li><a href = "consultas.php">Ver Consultas</a></li>
        </ul>
        </nav>
</header>
<main>
  <section id = "agendamento">
<?php include ('conex.php'); ?>
    <h2>Agendar uma consulta</h2>
    <form method='post' action="agendamento_post.php">
      <div class = borda>	
        <h4>CPF do paciente:</h4>
            <input oninput="mascara(this)" id="cpf_paciente" name="cpf_paciente" placeholder="" required type="text" required="">
      </div>	
      <!--<div class = borda>
        <h4>CPF do médico:</h4>
            <input oninput="mascara(this)" id="cpfmedico" name="cpfmedico" placeholder="" required type="text" required="">
      </div>-->
      <!-- <div class = borda>
        <h4>E-mail para contato:</h4>
        <input id="email" type="email" name="digitar" id="idigitar" placeholder="" required/>
      </div> -->
      <!-- <div class = borda>
        <h4>Escolha o local da sua consulta:</h4>
        <select>
          <option value=""></option>
          <option value="med">Clínica Geral Balbino</option>
          <option value="med">Hospital Psiquiátrico Josilmar Santos</option>
          <option value="med">Hospital Infantil Varella Santiago</option>
          <option value="med">Hospital Soularte</option>
        </select>
      </div> -->
      <div class = borda>
        <h4>Selecione o médico:</h4>
        <select id="cpf_medico" name="cpf_medico">
	<option value=""></option>
	<?php 
	$query = 'SELECT * FROM medico';
	$result = mysqli_query($db, $query) or die (mysqli_error($db));
	while ($row = mysqli_fetch_assoc($result)) {
	echo '<option value="'.$row['cpf'].'">'.$row['nome'].' ('.$row['especialidade'].')</option>';
	}
	?>
	  <!--
          <option value="med">Dr. Jorson Albino (Ortopedia)</option>
          <option value="med">Dra. Lielly Natally (Ginecologia)</option>
          <option value="med">Dra. Luiza Varella (Pediatra)</option>
          <option value="med">Dr. Renan Balbino (Clínico Geral)</option>
          <option value="med">Dr. Roger Carvalho (Psiquiatria)</option>-->
        </select>
      </div>
      <div class = borda>
        <h4>Selecione o dia da consulta:</h4>
        <input type="date" id="dt_consulta" name="dt_consulta" required/>
      </div>
      <!-- <div class = borda>
        <h4>Registre o dia do agendamento:</h4>
        <input type="d" id="d" required/>
      </div> -->
     <!-- <div class = borda>
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
    <figure class = "img">
      <img src="img/img2.jpg" alt="figura ilustrativa de um médico"/>
    </figure>
    <div class = "botao">
      <input id="enviar" type="submit" value="Agendar consulta"/>
    </div>
  </section>
  </form>
</main>
<footer>
  <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
</footer>
</body>
</html>
