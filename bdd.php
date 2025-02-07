<?php

class Database {
    private $host = '192.168.56.40';
    private $username = 'operateur';
    private $password = 'operateur';
    private $dbname = 'Quizz';
    private $connection;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        try{
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        }catch (Exception $e){
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function requete(){
        $req = ("select * from quizz;");
        $result = $this->connection->query($req); // Exécution de la requête
        return $result -> fetch_all(MYSQLI_ASSOC);
    }    
}
?>
 