<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"  />
    <link rel="stylesheet" href="Css/style.css" />
    <title><?= $title ?></title>
  </head>

    <body>
        <div id="global">
            <header>
                <h1>Blog pour un écrivain</h1>
                <a href="index.php">Retour à la liste des billets</a>
            </header>
        <div>
            <?= $content ?>     
        </div> <!--contenu-->

        <footer>
    	  <p>Ce blog est réalisé en PHP, HTML 5 et CSS 3.</p>
    	</footer>
    </div>
    </body>
</html>    
