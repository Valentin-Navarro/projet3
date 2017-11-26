

<?php
session_start(); 


require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurAdmConnexion.php';
require_once 'Controleur/ControleurAdmBillet.php';
require_once 'Controleur/ControleurAdmAccueil.php';
require_once 'Vue/vue.php';


class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;
  private $ctrlAdmConnexion;
  private $ctrlAdmBillet;
  private $ctrlAdmAccueil;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new ControleurBillet();
    $this->ctrlAdmConnexion = new ControleurAdmConnexion();
    $this->ctrlAdmBillet = new ControleurAdmBillet();
    $this->ctrlAdmAccueil = new controleurAdmAccueil();
  }

    // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
	  if (isset($_GET['action'])) {
	    if ($_GET['action'] == 'billet') {
	      $idBillet = intval($this->getParametre($_GET, 'id'));
	      if ($idBillet != 0) {
	        $this->ctrlBillet->billet($idBillet);
	      }
	      else
	        throw new Exception("Identifiant de billet non valide");
	    }
      else if ($_GET['action'] == 'liresuite') {
        $idBillet = $this->getParametre($_POST, 'idB');
        $this->ctrlBillet->billet($idBillet);
      } 
	    else if ($_GET['action'] == 'commenter') {
	      $auteur = $this->getParametre($_POST, 'auteur');
	      $contenu = $this->getParametre($_POST, 'contenu');
	      $idBillet = $this->getParametre($_POST, 'id');
	      $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
	    } 
      else if ($_GET['action'] == 'signaler'){  
        $idCommentaire = $this->getParametre($_POST, 'id');
        $idBillet = $this->getParametre($_POST, 'idB');
        $this->ctrlBillet->signaler($idCommentaire, $idBillet);
      }
       else if ($_GET['action'] == 'seconnecter'){  
        $pseudo = $this->getParametre($_POST, 'pseudo');
        $mdp = $this->getParametre($_POST,'mdp');
        $this->ctrlAdmConnexion->connexion($pseudo,$mdp);
      }
      else if ($_GET['action'] == 'connexion'){
       if($_SESSION){
          $pseudo = $this->getParametre($_SESSION,'pseudo');
          $this->ctrlAdmConnexion->controlsession($pseudo);
         }
        else
          {
          $this->ctrlAdmConnexion->pageconnexion();
          }
      }
      else if ($_GET['action'] == 'Deconnexion'){
          $this->ctrlAdmConnexion->destroy();
      }
     
      else if($_GET['action'] == 'pageajouterbillet'){
        $this->ctrlAdmAccueil->pageajoutbillet();
      }
      else if($_GET['action'] == 'ajouter'){
        $titre = $this->getParametre($_POST,'titre');
        $myTextarea = $this->getParametre($_POST,'myTextarea');
        $this->ctrlAdmBillet->ajouter($titre,$myTextarea);
        $this->ctrlAdmAccueil->billetajouter();
      }
      else if($_GET['action'] == 'modifierbillet'){
        $idBillet = $this->getParametre($_POST,'idB');
        $this->ctrlAdmBillet->pagemodifierbillet($idBillet);
      }
      else if($_GET['action'] == 'majB'){
        $idBillet = $this->getParametre($_POST,'idB');
        $titre = $this->getParametre($_POST,'titre');
        $myTextarea = $this->getParametre($_POST,'myTextarea');
        $this->ctrlAdmBillet->majB($idBillet,$titre,$myTextarea);
        $this->ctrlAdmAccueil->vueaccueiladm();
      }
      else if($_GET['action'] == 'supprimerB'){
        $idBillet = $this->getParametre($_POST,'idB');
        $this->ctrlAdmBillet->supprimerB($idBillet);
        $this->ctrlAdmAccueil->vueaccueiladm();
      }
      else if($_GET['action'] == 'de-signaler'){
        $idCommentaire = $this->getParametre($_POST,'idC');
        $this->ctrlAdmBillet->designaler($idCommentaire);
        $this->ctrlAdmAccueil->vueaccueiladm();
      }
      else if($_GET['action'] == 'supprimerCom'){
        $idCommentaire = $this->getParametre($_POST,'idC');
        $this->ctrlAdmBillet->supprimerC($idCommentaire);
        $this->ctrlAdmAccueil->vueaccueiladm();
      }
      else
	      throw new Exception("Action non valide");
	  }
    else {  // aucune action définie : affichage de l'accueil
      $this->ctrlAccueil->accueil();
      }
	  }
    
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}