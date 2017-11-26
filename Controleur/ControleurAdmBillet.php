<?php

require_once 'Modele/ClassBillet.php';
require_once 'Modele/ClassCommentaire.php';
require_once 'Vue/vue.php';

class ControleurAdmBillet {

	private $billet;
	private $commentaire;
	

	public function __construct(){
		$this->billet = new Billet();
		$this->commentaire = new Commentaire();
	}
	
	public function ajouter($titre,$myTextarea){
		$this->billet->ajouterBillet($titre,$myTextarea); 
	}	
	public function pagemodifierbillet($idBillet){
		$billet = $this->billet->getBillet($idBillet);
		$vue = new Vue("ModifierBillet"); 
		$vue->generer(array('billet'=>$billet));
	}

	public function majB($idBillet,$titre,$myTextarea){
		$this->billet->majBillet($idBillet,$titre,$myTextarea);
	}

	public function supprimerB($idBillet){
		$this->billet->suppBillet($idBillet); 

	}

	public function designaler($idCommentaire){
		$this->commentaire->designalerC($idCommentaire);
		
	}

	public function supprimerC($idCommentaire){
		$this->commentaire->suppCommentaire($idCommentaire); 
	}

	

	

// verifier s'il existe une connexion à chaque fois. 
}