<?php
include ('conex.php');

if(isset($_GET['cpf']))
{
$query = "SELECT * FROM paciente WHERE cpf='".$_GET['cpf']."'";
}
else die("Erro de login");

$resultado = mysqli_query($db, $query) or die(mysqli_error($db));
while($obj = mysqli_fetch_assoc($resultado))
{
$cpf = $obj['cpf'];
$nome = $obj['nome'];
$email = $obj['email'];
$telefone = $obj['telefone'];
$dt_nasc = $obj['dt_nasc'];
$senha = $obj['senha'];
}
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
          <li><a href = "login.html">Login</a></li>
          <li><a href = "cadastro.html">Cadastro</a></li>
        </ul>
        </nav>
</header>
<main> 
    <section id = "cadastro">
       <form action = "editar_post.php" method="post">
      <h2>Editar informações</h2>
        <div class = borda> 
          <h4>Nome Completo:</h4> 
              <input id="nome" type="text" name="nome" value="<?php echo $nome ?>" placeholder="" > 
        </div>
        <div hidden class = borda>
          <h4>CPF:</h4>
              <input oninput="mascara(this)" value="<?php echo $_GET['cpf']; ?>" id="cpf" name="cpf" placeholder=""  type="text">
        </div>
        <div class = borda> 
          <h4>Telefone:</h4> 
              <input id="telefone" type="tel" value="<?php echo $telefone ?>" name="telefone" placeholder="" onkeyup="handlePhone(event)"/>          
        </div>
        <div class = borda>
          <h4>E-mail:</h4>
          <input id="email" type="email" value="<?php echo $email ?>" name="email" placeholder="" />
        </div>
        <div class = borda>
          <h4>Data de nascimento:</h4>
          <input type="date" id="date" value="<?php echo $dt_nasc ?>" name="dt_nasc" />
        </div>
        <!-- <div class = borda>
        <h4>Endereço:</h4> 
          <input type="text"  name="digitar" id="digitar" placeholder="" required/>
        </div> -->
        <div class = borda>
          <h4>Senha:</h4>
          <input type="password" value="<?php echo $senha ?>" id="senha" name="senha"/>
        </div>
        <!-- <div id="checkbox"> 
          <input type="checkbox"/>
          <label for="horns">Possuo plano de saúde.</label>
        </div> -->
     
    </section>
    <section>
    <figure class="img">
      <img src="img/img5.png" alt="figura ilustrativa de uma pessoa acessando dados privados."/>
    </figure>
    <div class = "botao" >
    <a href = "editar_post.php">
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
