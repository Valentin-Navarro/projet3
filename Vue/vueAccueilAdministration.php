<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

    <div id="global">
      <div id="contenu">
        <div class="row">
          <div class="col-lg-2">
            <form  method="post" action="index.php?action=pageajouterbillet">
              <input type="submit" value="Ajouter un nouvel article"/>
            </form>
          </div>
        </div>
       
        <h3> Tous les billets </h3>

        <?php foreach ($billets as $billet): ?>
          <p class="titreBillet"><?= $billet['titre'] ?></p>
          <div class="row">
            <div class="col-lg-8"> <?=$rest = substr($billet['contenu'], 0,50) ?> </div>
            <div class="col-lg-2">
              <form  method="post" action="index.php?action=modifierbillet">
                <input type="hidden" name="idB" value="<?= $billet['id']?>"/>
                <input type="submit" value="Modifier"/>
              </form>
            </div>
            <div class="col-lg-2">
              <form  method="post" action="index.php?action=supprimerB">
                <input type="hidden" name="idB" value="<?= $billet['id']?>"/>
                <input type="submit" value="Supprimer"/>
              </form>
            </div>
          </div>
        <?php endforeach; ?>  

        </br>

        <h3> Tous les commentaires signalés par Billet </h3>

        <?php foreach ($commentaires as $commentaire): ?>
            <div class="row"> 
              <div class="col-lg-8"> <p><?= $commentaire['contenu'] ?> 
              </div>
              <div class="col-lg-2">
                <form method="post" action="index.php?action=de-signaler">
                  <input type="hidden" name="idC" value="<?= $commentaire['idC']?>"/>
                  <input type="submit" value="Dé-signaler"/>
                </form>   
              </div>
              <div class="col-lg-2">
                <form method="post" action="index.php?action=supprimerCom">
                  <input type="hidden" name="idC" value="<?= $commentaire['idC']?>"/>
                  <input type="submit" value="Supprimer"/>
                </form>
              </div>
            </div>
        <?php endforeach; ?>

      </div>

      <footer id="piedBlog">
       <a href="index.php?action=Deconnexion"><p> se deconnecter</p> </a>
      </footer>
    </div> <!-- #global -->
  </body>
</html>