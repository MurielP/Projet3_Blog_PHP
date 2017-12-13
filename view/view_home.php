<?php foreach ($posts as $key => $post) : ?> 
	
	<article>
		<header>
			<a href="index.php?action=post&id=<?= htmlspecialchars($post['id']) ?>">
			<a href="user.php?action=register">Accès administrateur</a>
			<h1><?= htmlspecialchars($post['title']) ?></h1></a>
			De : <?= htmlspecialchars($post['author']) ?><br />
			Le <time><?= $post['creation_date'] ?></time>
		</header>
			<p><?=  htmlspecialchars($post['content']) ?></p>
	</article>
		<hr/> 
<?php endforeach; ?>

	