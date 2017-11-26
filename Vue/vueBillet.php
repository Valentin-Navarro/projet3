<?php $this->titre = "Mon Blog - " . $billet['titre']; ?>


<article>
  <header>
    <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
    <time><?= $billet['date'] ?></time>
  </header>
  <p><?= $billet['contenu'] ?></p> 
</article>
<hr />
<header>
  <h1 id="titreReponses">Votre commentaire à l'article : <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
  <p><?= $commentaire['auteur'] ?> dit :</p>
  <p><?= $commentaire['contenu'] ?></p>
  <?php 
  if (!$commentaire['signalement']) {?>
  <form method="post" action="index.php?action=signaler">
    <input type="hidden" name="id" value="<?= $commentaire['id'] ?>" />
    <input type="hidden" name="idB" value="<?= $billet['id'] ?>" />
    <input type="submit" value="signaler" />
  </form>
  <?php 
    }
    else echo 'commentaire déjà signalé';
    ?>
   
<?php endforeach; ?>

<!--L'affichage d'une vue se fera désormais en instanciant un objet de la classe Vue, puis en appelant sa méthode generer().-->

<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

<!--Remarque : l'action associée à la soumission du formulaire est nommée commenter.-->
