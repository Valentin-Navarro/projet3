<?php

require_once 'Modele/ClassBillet.php';
require_once 'Vue/vue.php';

class ControleurAccueil {

  private $billet;

 public function __construct() {  
    $this->billet = new Billet(); //instancie la classe billet 
  }

  // Affiche la liste de tous les billets du blog
  public function accueil() {
    $billets = $this->billet->getBillets();
    $vue = new Vue("Accueil");
    $vue->generer(array('billets' => $billets)); 
  }



}
 
