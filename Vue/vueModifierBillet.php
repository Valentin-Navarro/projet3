<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="Contenu/style.css" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">
   		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<title>Ajout/modification d'un article</title>
	 <script type="text/javascript" src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
	 <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=fgmg42gbtc9yqv724tm3bs6v5oeirrkt95knsish2k7pkfcw"></script>
 	 <script type="text/javascript">
	  tinymce.init({
	    selector: '#myTextarea',
	    theme: 'modern',
	    width: 600,
	    height: 300,
	    plugins: [
	      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	      'save table contextmenu directionality emoticons template paste textcolor'
	    ],
	    content_css: 'css/content.css',
	    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
	  });
	 </script>
	</head>

<body>
  <form method="post" action="index.php?action=majB">
  		<input type="hidden" name="idB" value="<?= $billet['id']?>"/>
  	<p>
  		<label for="Titre"> Titre de l'article </label> : <input type="text" name="titre" id="titre" value="<?= $billet['titre']?> ">
   	</p>
  		<textarea name="myTextarea" id="myTextarea" <?= $billet['contenu']?> </textarea>
  	<p>
  		<input type="submit" value="Envoyer">
  	</p>
  </form>

</body>
</html>
