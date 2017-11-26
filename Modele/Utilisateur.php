<?php

require_once 'Modele/Modele.php';

class Utilisateur extends Modele {

	public function gettestConnexion($pseudo, $mdp) {
		$sql = 'SELECT COUNT(*) FROM AUTEUR WHERE AUT_PSEUDO = :pseudo AND AUT_MDP = :mdp';
		$connexions = $this->executerRequete($sql,array('pseudo' => $pseudo,'mdp' => $mdp));
		// valeur renvoyé de l'interpretation de requête pour avoir le résultat et non le contenu
		$test = $connexions->fetchColumn(); 
		return $test;
	}

	public function getcontrolsession($pseudo) {
		$sql = 'SELECT COUNT(*) FROM AUTEUR WHERE AUT_PSEUDO = :pseudo';
		$connexions = $this->executerRequete($sql,array('pseudo' => $pseudo));
		$test = $connexions->fetchColumn(); 
		return $test;
	}

}