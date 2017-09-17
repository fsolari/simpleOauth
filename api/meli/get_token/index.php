<?php

header('Content-type: application/json');
ini_set('display_errors', 0);

require '../meli.php';
require '../../functions.php';

extract($_GET);

$meli = new Meli('2220486502877433', 'rG3n3Lk7830EdUfjwoUuUB0wc9Sq4hQR');

// Lee sellers
$access_token = getFieldValue("SELECT access_token FROM simpleoauth.users where the_token='".$token."';","access_token");


if($access_token!='0'){

	$expires_in = getFieldValue("SELECT expires_in FROM simpleoauth.users where the_token='".$token."';","expires_in");

	if($expires_in < time()) {

		$user_id = getFieldValue("SELECT user_id FROM simpleoauth.users where the_token='".$token."';","user_id");
		$refresh_token = getFieldValue("SELECT refresh_token FROM simpleoauth.users where the_token='".$token."';","refresh_token");

		try {
			
			$refresh = $meli->refreshAccessToken();

			$access_token 	= $refresh['body']->access_token;
			$expires_in 	= time() + $refresh['body']->expires_in;
			$refresh_token 	= $refresh['body']->refresh_token;

			$query = "UPDATE simpleoauth.users SET access_token='$access_token', expires_in='$expires_in', refresh_token='$refresh_token' WHERE user_id=$user_id";
			$q = updateQuery($query);

			echo "{\"access_token\":\"$access_token\",\"updated\":true}";
			die;
		} catch (Exception $e) {
		  	echo "{\"error\":\"$e->getMessage()\"}";
		  	die;
		}
	}

}


echo "{\"access_token\":\"$access_token\"}";
?>