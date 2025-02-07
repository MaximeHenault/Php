<?php

    include('bdd.php');

    class AppMVC {

        private $bdd;

        public function __construct(){
            $this -> bdd = new mysqli();
        }

        public function afficherPage($mapage){
            if(!$this -> bdd -> connexion()){
                echo "Une erreur est servenue à la connexion";
            }

            if($mapage == 1) $this -> page1();
            else if ($mapage == 2) $this -> page2();
            else $this -> page1();

            $this -> bdd -> deconnexion();
        }

        public function page1(){
            echo "Première page";
        }

        public function page2(){
            echo "Deuxième page";
        }
    }
?>