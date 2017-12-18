
<!-- conserver l'affichage du template des vues même en cas d'erreur, on reprend le code vueAccueil-->
<title><?php  $this->title = 'Page d\'erreur'; ?></title>

	<p>Une erreur est survenue : <?= $errorMessage ?></p>
	<p><a href="index.php">Revenir à la page d'accueil</a></p>


