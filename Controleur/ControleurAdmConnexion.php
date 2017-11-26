<?php

require_once 'Modele/Utilisateur.php';
require_once 'Controleur/ControleurAdmAccueil.php';
require_once 'Controleur/ControleurAccueil.php';
require_once 'Vue/vue.php';

class ControleurAdmConnexion {

private $connexion;
private $vueaccueiladm;

	public function __construct(){
		$this->connexion = new Utilisateur();
		$this->vueaccueiladm = new ControleurAdmAccueil();
		$this->crtlAccueil = new ControleurAccueil();
		}

	public function connexion($pseudo, $mdp){
		$connexions = $this->connexion->gettestConnexion($pseudo, $mdp);
		if ($connexions)
			{	
			//session_start();
   			$_SESSION['pseudo'] = $pseudo;
   			$this->vueaccueiladm->vueaccueiladm(); 
			}
			else
			{
			$this->pageconnexionerreur();
			}
	}

	public function controlsession ($pseudo){
		//session_start();
		if (isset($_SESSION['pseudo'])){
			$this->vueaccueiladm->vueaccueiladm();
			}
		else 
			{
			$this->crtlAccueil->accueil();
			}
	}
	
	//redirection page suite connexion
	public function pageconnexionerreur(){
		$vue = new Vue("ConnexionErreur");
		$vue->generer(array());
	}
	
	public function pageconnexion(){
		$vue = new Vue("Connexion");
		$vue->generer(array());
	}

	public function destroy(){
		$_SESSION = array();
		session_destroy();
		unset($_SESSION);
		$this->crtlAccueil->accueil();
    }
	


}