<article>
    <header>
    	<h2>S'enregistrer</h2>
    	<a href="index.php">Retour à l'accueil</a>
       
    </header>


<h2>Créer mon compte</h2>
	
<form method="post" action="index.php?action=registerUser">
	<p><label for="username">Pseudonyme</label> : <input type="text" name="usernameusername" id="username" value=""/></p>
	<p><label for="pass">Mot de passe</label> : <input type="password" name="pass" id="pass" value=""/></p>
	<p><label for="confirm_pass">Confirmez votre mot de passe</label> : <input type="password" name="confirm_pass" value=""/></p>
	<p><label for="mail">Mail</label> : <input type="email" name="mail" value=""/></p>
	<p><label for="confirm_mail">Confirmez votre mail</label> : <input type="email" name="confirm_mail" value=""/></p>

	<p><button type="submit" value="" />Créer mon compte</button>
</form>
