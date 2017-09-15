<?php

header('Content-type: application/json');
ini_set('display_errors', 0);

$site_id = "MLC";
require '../meli.php';
require '../../functions.php';

extract($_GET);


$meli = new Meli('3457564032082336', 'vCoVIvjl8vcwtOliP9svHiuCI41ExX6Z');


// Lee sellers
$res = executeQueryArray('SELECT * FROM meliexpress.sellers ORDER BY points DESC');


//print_r($res);
// Obtiene el seller_id
$r = $res[0]['user_id'];

if(!isset($offset)){$offset=null;}
if(!isset($limit)){$limit=null;}
if(!isset($q)){$q="";}
if(!isset($seller_id)){$seller_id=null;}

$all_results = array();

foreach($res as $seller) {
	
 	$seller_id = $seller['user_id'];

	$params = array('q'=>urlencode($q),
					'offset'=>$offset,
					'limit'=>$limit,
					'seller_id'=>$seller_id);

 	$res = $meli->get("/sites/$site_id/search",$params);

	array_push($all_results, $res['body']->results);

	// Ordena los sellers por points

}


print_r(json_encode($all_results));
