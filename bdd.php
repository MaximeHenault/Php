<?php

    class BDD {

        private $mysqli;

        public function __constructeur(){
            $this -> mysqli = false;
        }

        public function connexion(){
            $this -> mysqli = new mysqli('172.16.10.40','sio1-tp2','Sio1TP2.56','rpgquest');

            if($this -> mysqli == false) return false;
            else return true;
        }

        public function deconnexion(){
            if($this -> mysqli != false){
                $this -> mysqli -> close();
            }
        }

        public function requete(){

        }

    }
?>