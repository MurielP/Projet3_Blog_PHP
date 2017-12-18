<article>
    <header>
    	<a href="index.php">Retour à la liste des billets</a>
        <h1><?= htmlspecialchars($post['title']) ?></h1>
         <time><?= $post['creation_date'] ?></time>
       
    </header>
    <p><?= htmlspecialchars($post['content']) ?></p>
</article>
<hr />
<header>
    <h1>Commentaires : <?= htmlspecialchars($post['title']) ?></h1>
</header>

<?php foreach ($comments as $key => $comment) : ?> 
	<article>
		<p>Commentaire de : <?= htmlspecialchars ($comment['author']) ?> <br/>
		Le <?= $comment['comment_date'] ?><br/>
		<?= nl2br(htmlspecialchars($comment['comment'])) ?>
		</p>
	</article>
		<hr/> 
<?php endforeach; ?>


<h2>Laissez-nous votre commentaire</h2>
	
<form method="post" action="index.php?action=toComment">
	<p><label for="author">Auteur du commentaire</label> : <input type="text" name="author" id="author" value=""/></p>
	<p><label for="comment">Nouveau commentaire</label> : <input type="textarea" name="comment" id="comment" value=""/></p>
			
	<input type="hidden" name="id" id="id" value="<?php echo $post['id'];?>"/> 

	<p><input type="submit" value="Postez votre commentaire" /></p>
</form>
