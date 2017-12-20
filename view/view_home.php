	<a href="index.php?action=registerUser">Se connecter</a>

<?php foreach ($posts as $key => $post) : ?> 
	
	<article>
		<header>
		
			<a href="index.php?action=post&id=<?php echo $post['id']; ?>">

			<h1><?= htmlspecialchars($post['title']) ?></h1></a>
			De : <?= htmlspecialchars($post['author']) ?><br />
			Le <time><?= $post['creation_date'] ?></time>
		</header>
			<p><?=  htmlspecialchars($post['content']) ?></p>
	</article>
		<hr/> 
<?php endforeach; ?>

	