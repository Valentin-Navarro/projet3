<?php

/**
* 
*/
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



}


