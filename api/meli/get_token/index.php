<?php

header('Content-type: application/json');
ini_set('display_errors', 0);

require '../meli.php';
require '../../functions.php';

extract($_GET);

$meli = new Meli('2220486502877433', 'rG3n3Lk7830EdUfjwoUuUB0wc9Sq4hQR');

// Lee sellers
$access_token = getFieldValue("SELECT access_token FROM simpleoauth.users where the_token='".$token."';","access_token");



 //	$res = $meli->get("/sites/$site_id/search",$params);

//	array_push($all_results, $res['body']->results);

	// Ordena los sellers por points



echo "{\"access_token\":\"$access_token\"}";




// Compara orders con user_id de compradores registrados

// envía notificaciones de las compras




?>