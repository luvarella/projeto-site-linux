<?php
require_once '../conexao.php';

class PacienteDAL {
    private $pdo;


    public function __construct() {
      $conexao = new Conexao();
      $this->pdo = $conexao->getPDO();
    }

  
    //Insert
    public function inserir($nome, $cpf, $telefone, $email, $dt_nasc, $senha){
        if(isset($email) && isset($cpf) && isset($senha)){
            $sql = $this->pdo->prepare("INSERT INTO pacientes (nome, cpf, telefone, email, dt_nasc, senha) VALUES ('". $nome ."', '". $cpf ."', '". $telefone ."', '". $email ."', ". $dt_nasc .", '". $senha ."')");
            $sql->execute(array($nome, $cpf, $telefone, $email, $dt_nasc, $senha));
            echo "inserido com sucesso!";
        }
    }

    //Select
    public function listar() {
        $sql = $this->pdo->prepare("SELECT * FROM pacientes");
        $sql->execute();

        $lista = array();
        $fetchPacientes = $sql->fetchAll();
        foreach ($fetchPacientes as $key => $value) {
            $lista[] = $value;
        }
        return $lista;
    }

    //Delete
    public function deletar($cpf){
        if (isset($_GET['delete'])){
            $cpf = (int)$_GET['delete'];
            $this->pdo->prepare("DELETE FROM pacientes WHERE cpf=$cpf");
            $this->pdo->execute();
        }
    }

}

?>