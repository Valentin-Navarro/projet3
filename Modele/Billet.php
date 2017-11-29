<?php
class Billet {

	private $id;
	private $dateb;
	private $titre;
	private $contenu;



	public function getId(){
		return $this->id; // retourne la valeur
	}

	public function getDateb(){
		return $this->dateb;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function getContenu(){
		return $this->contenu;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setDateb($dateb){
		$this->dateb = $dateb;
	}

	public function setTitre($titre){
		$this->titre = $titre;
	}

	public function setContenu($contenu){
		$this->contenu = $contenu;
	}
	

	public function hydrate(array $data)
	{
	  foreach ($data as $key => $value)
	  {
	    // On récupère le nom du setter correspondant à l'attribut.
	    $method = 'set'.ucfirst($key);
	        
	    // Si le setter correspondant existe.
	    if (method_exists($this, $method))
	    {
	      // On appelle le setter.
	      $this->$method($value);
	    }
	  }
	}
