<?php 

echo 'Salut';


try { 
	require_once 'model/connection.php';
} catch (Exception $e) {
die ('Erreur: ' . $e->getMessage()); 
}

require('view/view_accueil.php');

/**
function debug($var) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	die();
}
**/