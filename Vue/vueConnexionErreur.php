
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title><?= $titre ?></title>   <!-- Élément spécifique -->
  </head>
  <body>
    <div id="global">
      <header>
        <h2 id="titreBlog">Veuillez vous identifier</h2>
        
      </header>
      <div id="contenu">
        
        <form  method="post" action="index.php?action=seconnecter">
			    <p><label for="pseudo">Votre pseudo</label>: <input type="text" name="pseudo" id="pseudo"/></p>
		      <p><label for="pass">Votre mot de passe</label> : <input type="password" name="mdp" id="mdp"/></p>
			    <input type="submit" value="connexion"/>
        </form>
        <p> Pseudo ou Mot de passe invalide </p>    
      </div>

      <footer id="piedBlog">
      
       
      </footer>
    </div> <!-- #global -->
  </body>
</html>
