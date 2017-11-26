<?php

require_once 'Modele/ClassBillet.php';
require_once 'Modele/ClassCommentaire.php';
require_once 'Vue/vue.php';

class ControleurAdmAccueil {

private $billet;
private $commentaire;

public function __construct(){
	$this->billet = new Billet();
	$this->commentaire = new Commentaire();
}

	//redirection page pour aller ajouter un article
	public function pageajoutbillet(){
	$vue = new Vue("AjoutBillet");
	$vue->generer(array());
	}

	//redirection page suite ajout billet
	public function billetajouter(){
		$this->vueaccueiladm();
	}


	public function vueaccueiladm() {
    $billets = $this->billet->getBillets();
    $commentaires = $this->commentaire->getCommentairessignales();
    $vue = new Vue("AccueilAdministration");
    $vue->generer(array('billets' => $billets,'commentaires' => $commentaires ));
  	}

 }