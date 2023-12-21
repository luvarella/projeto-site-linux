<?php
require_once '../conexao.php';

class PacienteDAL {
    private $pdo;

    //Insert
    public function inserir(){
        if(isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['senha'])){
            $sql = $this->pdo->prepare("INSERT INTO paciente (nome, cpf, telefone, email, dt_nasc, senha) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->execute(array($_POST['nome'],$_POST['cpf'],$_POST['telefone'],$_POST['email'],$_POST['dt_nasc'],$_POST['senha']));
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
            $sql->execute();
        }
    }
        
}

?>