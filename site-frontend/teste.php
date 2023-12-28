<?php
    $pdo = new PDO('mysql:host=localhost;dbname=siteics','root','ifrn');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
    

    //LISTAR
    
    
?>
<form method="post">
    <input type="text" name="nome">
    <input type="submit" value="Enviar">
</form>

<!-- Aqui é um exemplo de uma tabela -->
<table>
    <thead>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Data de nascimento</th>
    </thead>   
    <tbody>
        <?php
            include "dal/PacienteDAL.php";
            $dao = new PacienteDAL();

            foreach ($lista as $obj)
            {
        ?>
            <td><?php echo $obj->nome ?></td>
            <td><?php echo $obj->email ?></td>
            <td><?php echo $obj->cpf ?></td>
            <td><?php echo $obj->telefone ?></td>
            <td><?php echo $obj->dt_nasc ?></td>
        <?php 
            }
        ?>
    </tbody>
</table>


<!-- Aqui é o exemplo de uma lista -->
<ul>
<?php
        
        include "dal/PacienteDAL.php";
        $dao = new PacienteDAL();
        
        foreach ($lista as $obj)
        {
            // echo $obj->nome;
            // echo $obj->cpf;
            // echo $obj->telefone;
            // echo $obj->email;
            // echo $obj->dt_nasc;
            // echo $obj->senha;
    ?>
    <li>Paciente: <?php echo $obj->nome ?> | <a href="delete=<?php echo $obj->cpf?>">Deletar</a></li>
    <?php
        }
    ?>
</ul>
