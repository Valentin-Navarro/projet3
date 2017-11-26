<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {

  // partie visiteur
  
  // Renvoie la liste des billets du blog
  public function getBillets() {
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' order by BIL_ID desc';
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  // Renvoie les informations sur un billet
  public function getBillet($idBillet) {
  
    $sql = 'select BIL_ID as id, BIL_DATE as date,'
      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
      . ' where BIL_ID=?';
    $billet = $this->executerRequete($sql, array($idBillet));
    if ($billet->rowCount() == 1)
      return $billet->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }


  //partie administration

    public function ajouterBillet($titre,$myTextarea) {
      $sql= 'insert into T_BILLET (BIL_DATE,BIL_TITRE,BIL_CONTENU)values (?,?,?)';
      $date = date('Y-m-d H:i:s');  
      $this->executerRequete($sql, array($date, $titre, $myTextarea));
    }
   
    public function majBillet($idBillet,$titre,$myTextarea) {
      $sql ='update T_BILLET set BIL_DATE=?, BIL_TITRE=?, BIL_CONTENU=? where BIL_ID=?';
      $date = date('Y-m-d H:i:s'); 
      $this->executerRequete($sql, array($date,$titre,$myTextarea,$idBillet));
    }

    public function suppBillet($idBillet) {
      $sql ='delete from T_BILLET where BIL_ID=?';
      $this->executerRequete($sql, array($idBillet));
      $sql ='delete from T_COMMENTAIRE where BIL_ID=?';
      $this->executerRequete($sql, array($idBillet));
    }


}