<!DOCTYPE html>
<html lang = "pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Saúde Mais - Cadastro</title>
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
    <section>
      <figure class = "img">
        <img src="img/img3.jpg" alt="figura ilustrativa de um médico"/>
      </figure>
      <?php
      require_once 'conexao.php';
      
      include "dal/PacienteDAL.php";
      $dao = new PacienteDAL();
      
      ?>
      <form action="index.html" method="get">
      <div class = "botao">
        <input id="enviar" type="submit" value="Criar perfil"/>
      </div>
    </section>
    <section id = "cadastro">
      <h2>Cadastre seu perfil</h2>
        <div class = borda> 
          <h4>Nome Completo:</h4> 
              <input id="text" type="text" name="nome" id="nome" placeholder="" required  >    
        </div>
        <div class = borda>
          <h4>CPF:</h4>
              <input oninput="mascara(this)" name="cpf" id="cpf" placeholder="" required type="text" required>
        </div>
        <div class = borda> 
          <h4>Telefone:</h4> 
              <input id="telefone" type="tel" name="telefone" id="telefone" placeholder="" required onkeyup="handlePhone(event)"/>          
        </div>
        <div class = borda>
          <h4>E-mail:</h4>
          <input id="email" type="email" name="email" id="email" placeholder="" required/>
        </div>
        <div class = borda>
          <h4>Data de nascimento:</h4>
          <input type="date" name="dt_nasc" id="dt_nasc" required/>
        </div>
        </div>
        <div class = borda>
          <h4>Senha:</h4>
          <input type="password" name="senha" id="senha" required/>
        </div>
      </form>
      <?php
        $paciente = $dao->inserir($_GET['nome'], $_GET['cpf'], $_GET['telefone'], $_GET['email'], $_GET['dt_nasc'], $_GET['senha']);
      ?>
    </section>
</main>
<footer>
  <address>Trabalho de ICS realizado por Jordson Albino, Lielly Natally, Luiza Varella, Pedro Vítor e Renan Balbino.</address>
</footer>
</body>
</html>