<?php

    include('bdd.php');

    class AppMVC {

        private $bdd;

        public function __construct(){
            $this -> bdd = new Database();
        }

        public function afficherPage($mapage){
            if(!$this -> bdd -> getConnection()){
                echo "Une erreur est servenue à la connexion";
                return;
            }

            $resultats = $this->bdd->requete(); 

        // Affiche les résultats ou fais quelque chose avec
            foreach ($resultats as $row) {
                echo "Numéro du quizz : " . $row["id"] . " - Catégorie : " . $row["nom"] . "<br>";
            }

            if($mapage == 1) $this -> page1();
            else if ($mapage == 2) $this -> page2();
            else $this -> page1();

            $this -> bdd -> closeConnection();
        }

        public function page1(){
            echo '<h1>Bienvenue sur le quizz</h1>';
        }

        public function page2(){
            echo "Deuxième page";
        }
    }
?>