<?php

class Vue {

  // Nom du fichier associé à la vue
  private $fichier;
  // Titre de la vue (défini dans le fichier vue)
  private $titre;

  public function __construct($action) {
    // Détermination du nom du fichier vue à partir de l'action
    $this->fichier = "Vue/vue" . $action . ".php";
  }

  // Génère et affiche la vue
  public function generer($donnees) {
    // Génération de la partie spécifique de la vue
    $contenu = $this->genererFichier($this->fichier, $donnees);
    // Génération du gabarit commun utilisant la partie spécifique
    $vue = $this->genererFichier('Vue/gabarit.php',
      array('titre' => $this->titre, 'contenu' => $contenu));
    // Renvoi de la vue au navigateur
    echo $vue;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFichier($fichier, $donnees) {
    if (file_exists($fichier)) {
      // Rend les éléments du tableau $donnees accessibles dans la vue
      extract($donnees);
      // Démarrage de la temporisation de sortie
      ob_start();
      // Inclut le fichier vue
      // Son résultat est placé dans le tampon de sortie
      require $fichier;
      // Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
  }

  // Génère et affiche la vue d'une page
  public function genererpage() {
    $vue = $this->genererFichierpage($this->fichier);
    // Renvoi de la vue au navigateur
    echo $vue;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function genererFichierpage($fichier) {
    if (file_exists($fichier)) {
      ob_start();
      // Inclut le fichier vue
      // Son résultat est placé dans le tampon de sortie
      require $fichier;
      // Arrêt de la temporisation et renvoi du tampon de sortie
      return ob_get_clean();
    }
    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }
}
}
//Le constructeur de Vue prend en paramètre une action, qui détermine le fichier vue utilisé. Sa méthode generer() génère d'abord la partie spécifique de la vue afin de définir son titre (attribut $titre) et son contenu (variable locale $contenu). Ensuite, le gabarit est généré en y incluant les éléments spécifiques de la vue. Sa méthode interne genererFichier() encapsule l'utilisation de require et permet en outre de vérifier l'existence du fichier vue à afficher. Elle utilise la fonction extract pour que la vue puisse accéder aux variables PHP requises, rassemblées dans le tableau associatif $donnees.