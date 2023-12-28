<?php
include ('conex.php');

if(isset($_POST['senha']) && isset($_POST['cpf']))
{
$query = "SELECT * FROM paciente WHERE cpf='".$_POST['cpf']."' and senha='".$_POST['senha']. "'";
}
else if (isset($_GET['cpf']))
{
$query = "SELECT * FROM paciente WHERE cpf='".$_GET['cpf']."'";
} else die("Erro no login");

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
  <title>Saúde Mais - Perfil</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet"/>
  <link href="css/index.css" rel="stylesheet"/>
  <link href="css/cadastro.css" rel="stylesheet"/>
  <link href="css/agendamento.css" rel="stylesheet"/>
  <link href="css/dados.css" rel="stylesheet"/>
  <link rel="stylesheet" href="css/deletar.css"/>
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
          <li><a href = "login.php">Login</a></li>
          <li><a href = "cadastro.php">Cadastro</a></li>
        </ul>
        </nav>
  </header>
  <main>
    <section id = "dados">
      <h2>Bem-vindo(a), <?php echo $nome ?></h2>
      <div class = "dados">
        <h4>Nome Completo:</h4>
        <p><?php echo $nome ?></p>
        <h4>CPF:</h4>
        <p><?php echo $cpf ?></p>
        <h4>Telefone:</h4>
        <p><?php echo $telefone ?></p>
        <h4>E-mail:</h4>
        <p><?php echo $email ?></p>
        <h4>Data de nascimento:</h4>
        <p><?php
	$a = explode("-", $dt_nasc);
	echo $a[2].'/'.$a[1].'/'.$a[0];
	?></p>
        <!--
        <h4>Senha:</h4>
        <p><?php echo $senha ?></p>
	-->
      </div>
    </section>
    <section>
      <figure class="img">
        <img src="img/img5.png" alt="figura ilustrativa de uma pessoa acessando dados privados."/>
      </figure>
      <div class = "botao" >
      <a href = "editar.php?cpf=<?php echo $cpf ?>">
      <input id="enviar" type="submit" value="Alterar Dados" style="margin-bottom: 0;"/>
      </a>
      </div>
      <div class = "botao">
      <a href="javascript:deletarconta()"><input id="enviar" type="submit" value="Deletar conta"/></a>
      <!-- <a href = "javascript:deletarconta()">
      <input id="enviar" type="submit" value="Deletar conta" />
      </a> -->
      </div>
    </section>
  </main>
  <section id="deletar">
   <div>
      <h4 style = "text-align: center;">Tem certeza que deseja apagar sua conta?</h4>
      <p style = "text-align: center; width: 363px; margin: 0 auto; margin-top: 15px;">Não será possível a recuperação dos seus dados após esta operação.</p>
     <!-- <h3><a href="javascript:fechar()">x</a></h3> -->
        <div class="botaodeletar">
          <div>
          <a href = "deletar.php?cpf=<?php echo $cpf ?>">
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
