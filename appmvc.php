<?php

	include("bdd.php");
    include("template.php");


	class AppMVC {

		private $bdd;

		public function __construct() {
			$this -> bdd = new BDD();
		}

		public function afficherPage($mapage, $id_question) {
			if(!$this -> bdd -> connexion()) {
				echo "Une erreur est survenue à la connexion";
				return;
			}
			
			if($mapage == 1) $this -> page1($id_question);
			else if($mapage == 2) $this -> page2();
			else $this -> page1($id_question);
			
			$this -> bdd -> deconnexion();
		}

		public function page1($id_question) {
			$bonnereponse = $this -> bdd -> reponsecorrect($id_question);		
            $reponses  = $this -> bdd -> getQuestion($id_question);

            if (count($reponses) == 1){
                
                    foreach($reponses as $reponse) {
				        echo '<h2>'."Question n°".$reponse -> id . " : " .$reponse -> intitule.'</h2>';
			        }

			    $reponses  = $this -> bdd -> getReponses($id_question);
			
                foreach($bonnereponse as $bonne){
                    echo $bonne -> id;
                }

			    echo '<ul>';
			    foreach($reponses as $reponse) {
				    echo '<li><input type="radio" name="reponses" value="'.$reponse -> id.'"> '.$reponse -> intitule.'</li>';
			    }
			    echo '</ul>';	
            }
            else{
                echo '<p>Erreur</p>';
            }
            	
		}

		public function page2() {
			$vue = new Template('template/question.html');
            echo $vue -> getSortie();
		}

        public function bouton($question){
            echo '<form method="get">';
                echo '<input type="hidden" name="question" value='.$question.'>';
                echo '<button type="submit">Question suivante</button>';
            echo '</form>';
        }

        function verifierreponse($id_question) {
            //if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reponses"])) {
                //$reponse_utilisateur = $_POST["reponses"];
            //}
            $bonnereponse = reponsecorrect($id_question);
            foreach($bonnereponse as $bonneReponse){
                if ($bonneReponse == 0)
                {
                    echo '<h2>Bonne réponse</h2>';
                }
                else
                {
                    echo '<h2>Mauvaise réponse</h2>';
                }
            }
        }


	}
?>