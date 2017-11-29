<?php

/**
* 
*/
class Database 
{
	private $database;

	public function getBdd() {
    if ($this->database == null) {
      // Création de la connexion
      $this->database = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8',
        'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->database;
  }	

}