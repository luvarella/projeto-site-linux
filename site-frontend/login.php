<!DOCTYPE html>
<html lang = "pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Saúde Mais - Login</title>
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
          <li><a href = "login.html">Login</a></li>
          <li><a href = "cadastro.html">Cadastro</a></li>
        </ul>
        </nav>
  </header>
  <main>
<?php include ('conex.php'); ?>
    <form action="perfil.php" method="post" style = "display: flex;">
    <section class = "login">
      <h2>Acessar seus dados</h2>
      <div class = borda>
        <h4>CPF:</h4>
            <input oninput="mascara(this)" name="cpf" id="cpf" placeholder="" required type="text" required="">
      </div>
      <div class = borda>
        <h4>Senha:</h4>
        <input type="password" name="senha" id="senha" required/>
      </div>
      <div class = "botao" style="margin-left: -1em;">
        <input id="enviar" type="submit" value="Acessar"/>
      </div>
    </section>
    <section>
      <figure class="img">
        <img src="img/img4.png" alt="figura ilustrativa de uma pessoa acessando dados privados."/>
      </figure>
    </section>
      </form>
  </main>
  <footer>
    <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
  </footer>
  </body>

  </html>
