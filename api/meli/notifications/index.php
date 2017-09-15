<?php

header('Content-type: application/json');
ini_set('display_errors', 0);

if($_REQUEST['token']!='3452eg-qwer4545-afsdfett-45345t'){
	header("HTTP/1.1 401");	
	echo "Unauthorized";
	die;
}


$site_id = "MLC";
require '../meli.php';
require '../../functions.php';

// Lee nuevas orders de sellers a acordar con el vendedor

// Lee sellers
$res = executeQueryArray('SELECT * FROM meliexpress.notifications order by id DESC;');

print_r(json_encode($res));


?>