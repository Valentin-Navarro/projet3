<?php

class ManagerBillet
{

	private $db;


	public function __construct($db)
	{
		$this->setDb($db);	
	}

	public function setDb($db)
	{
		$this->db = $db;
	}

	public function getBillets() {
	   /* $sql = 'select BIL_ID as id, BIL_DATE as dateb,'
	      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
	      . ' order by BIL_ID desc';
	    $billets = $this->executerRequete($sql);
    return $billets;*/
    	$billets = [];
    	$requete= $this->db->query("SELECT BIL_ID AS id, BIL_DATE AS dateb, BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET");
    	while ($data = $requete->fetch(PDO::FETCH_ASSOC)){
    	$billets[] = new Billet($data);
    	}
    	return $billets; 
 	}

 	public function getBillet($idBillet) {
	    /*$sql = 'select BIL_ID as id, BIL_DATE as date,'
	      . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
	      . ' where BIL_ID=?';
	    $billet = $this->executerRequete($sql, array($idBillet));
	    if ($billet->rowCount() == 1)
	      return $billet->fetch();  // Accès à la première ligne de résultat
	    else
	      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");*/

	  	$billet = [];
	  	$requet = $this->db->query("SELECT BIL_ID AS id, BIL_DATE AS dateb, BIL_TITRE AS titre, BIL_CONTENU AS contenu FROM T_BILLET WHERE BIL_ID");
	  	while ($data = $requete->fetch(PDO::FETCH_ASSOC)){
    	$billet[] = new Billet($data);

    	if ($billet->rowCount() == 1)
	      return $billet->fetch();  // Accès à la première ligne de résultat
	    else
	      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    	}
   	}


//partie administration

   	public function ajouterBillet($titre,$myTextarea) {
	    /*$sql= 'insert into T_BILLET (BIL_DATE,BIL_TITRE,BIL_CONTENU)values (?,?,?)';
	    $date = date('Y-m-d H:i:s');  
	    $this->executerRequete($sql, array($date, $titre, $myTextarea));*/

	    $requet = $this->db->prepare("INSERT INTO T_BILLET(BIL_DATE,BIL_TITRE,BIL_CONTENU) VALUES(:dateb, :titre, :contenu)"); 
	    $date = date('Y-m-d H:i:s'); 

	    $requet->bindValue(':dateb', $titre->date()); 
	    $requet->bindValue(':titre', $titre->titre()); 
	    $requet->bindValue(':contenu', $myTextarea->contenu());

	    $requet->execute();

    }

    public function majBillet($idBillet,$titre,$myTextarea) {
     	/*$sql ='update T_BILLET set BIL_DATE=?, BIL_TITRE=?, BIL_CONTENU=? where BIL_ID=?';
     	$date = date('Y-m-d H:i:s'); 
     	$this->executerRequete($sql, array($date,$titre,$myTextarea,$idBillet));*/

     	$requet = $this->db->prepare("UPDATE T_BILLET SET BIL_DATE = :dateb, BIL_TITRE = :titre ,BIL_CONTENU = :contenu WHERE BIL_ID = :id"); 
	    $date = date('Y-m-d H:i:s'); 

	    $requet->bindValue(':dateb', $titre->date()); 
	    $requet->bindValue(':titre', $titre->titre()); 
	    $requet->bindValue(':contenu', $myTextarea->contenu());
	    $requet->bindValue(':id', $myTextarea->id());
	    
	    $requet->execute();
	}

	public function suppBillet($idBillet) {
       /*$sql ='delete from T_BILLET where BIL_ID=?';
       $this->executerRequete($sql, array($idBillet));
       $sql ='delete from T_COMMENTAIRE where BIL_ID=?';
       $this->executerRequete($sql, array($idBillet));*/
       $requet = $this->db->exec('DELETE FROM T_BILLET WHERE BIL_ID = '.$idBillet->id()); 
       $requet = $this->db->exec('DELETE FROM T_COMMENTAIRE WHERE BIL_ID = '.$idBillet->id());
    }
}


