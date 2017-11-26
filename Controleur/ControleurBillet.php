<?php

require_once 'Modele/ClassBillet.php';
require_once 'Modele/ClassCommentaire.php';
require_once 'Vue/vue.php';

class ControleurBillet {

  private $billet;
  private $commentaire;
  
  
  public function __construct() {
    $this->billet = new Billet();
    $this->commentaire = new Commentaire();
  }
 
  // Affiche les détails sur un billet
  public function billet($idBillet) {
    $billet = $this->billet->getBillet($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet);
    $vue = new Vue("Billet");
    $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires ));
  }

   // Ajoute un commentaire à un billet
  public function commenter($auteur, $contenu, $idBillet) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet); 
    // Actualisation de l'affichage du billet
    $this->billet($idBillet);
  }

  //signalement d'un commentaire et modification de la valeur du bouton
   
  public function signaler($idCommentaire,$idBillet){
    
      //effectue le signalement
      $this->commentaire->aSignaler($idCommentaire, $idBillet);
      // Actualisation de l'affichage du commentaire
      $this->billet($idBillet);
  }
          

}

