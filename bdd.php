<?php
class BDD {

	private $mysqli;
	

	public function __construct() {
		$this -> mysqli = false;
	}

	/* Connexion à la base de données */
	public function connexion() {
		mysqli_report(MYSQLI_REPORT_OFF);
		
		$this -> mysqli = new mysqli('172.16.119.2', 'operateur', 'operateur', 'Quizz');

		if($this -> mysqli -> connect_errno != 0) {
			return false;
		}
		else return true;
	}
	
	
	/* Déconnexion à la base de données */
	public function deconnexion() {
		if($this -> mysqli -> connect_errno != 0) {
			$this -> mysqli -> close();
		}
	}

	public function getQuestion($id_question){
        $requete = $this -> mysqli -> prepare("SELECT question.id, question.intitule FROM question WHERE question.id = ?");
        $requete -> bind_param('i', $id_question);

        $requete -> execute();
        $resultat = $requete -> get_result();

        $requete -> close();

        while ($enregistrement = $resultat -> fetch_object()){
            $reponse[] = $enregistrement;
        }

        return $reponse;
    }
	
	/* Récupération des réponses d'une question en utilisant l'id de la question */
	public function getReponses($question_id) {
		$reponses = [];	//Servira a stocker la liste des reponses

		/* On crée la requete SQL et on lie les paramètres */
		$requete = $this -> mysqli-> prepare("SELECT reponse.id, reponse.intitule FROM reponse WHERE question_id=?");
		$requete -> bind_param('i', $question_id);
		
		/* On execute la requete et on récupère le résultat */
		$requete -> execute();
		$resultat = $requete -> get_result();
		
		/* On libère la requête */
		$requete -> close();
		
		
		/* On parcours les résultats pour les stocker */
		while ($enregistrement = $resultat -> fetch_object()) {
			$reponses[] = $enregistrement;	//On ajoute un element avec un l'id et l'intitule à la suite de nos réponses
		}
	
		return $reponses;		//On retourne les réponses de la question
	}
	
	public function getMulti($question_id){
		$requete = $this -> mysqli-> prepare("SELECT multiple FROM question WHERE question_id=?");
		$requete -> bind_param('i', $question_id);
		
		/* On execute la requete et on récupère le résultat */
		$requete -> execute();
		$resultat = $requete -> get_result();
		
		/* On libère la requête */
		$requete -> close();

		return $resultat;

	}

    public function reponsecorrect($question_id){
        $reponses = [];	//Servira a stocker la liste des reponses

		$requete = $this -> mysqli-> prepare("SELECT id FROM reponse WHERE question_id=? and bonnereponse = 1");
		$requete -> bind_param('i', $question_id);
	
		$requete -> execute();
		$resultat = $requete -> get_result();	

		$requete -> close();
		
		while ($enregistrement = $resultat -> fetch_object()) {
			$reponses[] = $enregistrement;	
		}
		
	
		return $reponses;		
	}  
}

?>
    
 