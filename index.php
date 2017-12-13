<?php 

require_once 'controller/router.php';

/** 
 * création du routeur et appelle de la méthode routeQuery()
 * @var router 
 */
$router = new router();
$router->routeQuery();

// ajout du mot salut encore
// 