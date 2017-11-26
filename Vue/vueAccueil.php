<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet): // à chaque tour de boucle effectué sur le tableau billets on attribue à la variable billet les valeurs du rang en cours
    ?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
            </a>
            <time><?= $billet['date'] ?></time>
        </header>
        <p><?=$rest = substr($billet['contenu'], 0,200) ?> ... </p>
        <form  method="post" action="index.php?action=liresuite">
                <input type="hidden" name="idB" value="<?= $billet['id']?>"/>
                <input type="submit" value="lire la suite"/>
        </form>
    </article>
    <hr />
<?php endforeach; ?>