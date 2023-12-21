<?php

class Conexao {
    private $pdo;
    public function __construct()
    {
        $hostname = 'mysql:host=localhost;dbname=siteics';
        $user = 'root';
        $senha = '';

        $this->pdo = new PDO($hostname, $user, $senha);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
}

?>