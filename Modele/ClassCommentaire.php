<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {

  // Renvoie la liste des commentaires associés à un billet
  public function getCommentaires($idBillet) {
    $sql = 'select COM_ID as id, COM_DATE as date, COM_AUTEUR as auteur,COM_SIGNALE as signalement, COM_CONTENU as contenu from T_COMMENTAIRE where BIL_ID=?';
    $commentaires = $this->executerRequete($sql, array($idBillet));
    return $commentaires;
  }
    // Ajoute un commentaire dans la base
  public function ajouterCommentaire($auteur, $contenu, $idBillet) {
    $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
      . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s');
    $auteur = htmlspecialchars($auteur);
    $contenu = htmlspecialchars($contenu);// Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
  }
  // permet de signaler un commentaire
  public function aSignaler($idcommentaire,$idBillet){
    $sql ='update T_COMMENTAIRE set COM_SIGNALE = true, BIL_ID=? where COM_ID=?';
    $this->executerRequete($sql, array($idBillet, $idcommentaire));
  }

  // partie administration
 
  public function designalerC ($idCommentaire){
    $sql ='update T_COMMENTAIRE set COM_SIGNALE = 0 where COM_ID=?';
    $this->executerRequete($sql, array($idCommentaire));
  }

  public function suppCommentaire($idCommentaire){
    $sql ='delete from T_COMMENTAIRE where COM_ID=?';
   $this->executerRequete($sql, array($idCommentaire));
  }

  public function getCommentairessignales(/*on ne met rien car on veux tout les com signalés*/){
    $sql = 'select COM_ID as idC, COM_DATE as date, COM_AUTEUR as auteur, COM_CONTENU as contenu, BIL_ID as id from T_COMMENTAIRE where COM_SIGNALE=true order by BIL_ID desc';
    $commentaires = $this->executerRequete($sql,array());
    return $commentaires;
  }
    
}

