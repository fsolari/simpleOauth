<?php

header('Content-type: application/json');
ini_set('display_errors', 0);

$site_id = "MLC";
require '../meli.php';
require '../../functions.php';


// Lee sellers
$res = executeQueryArray('SELECT user_id FROM meliexpress.sellers ORDER BY points DESC');


print_r(json_encode($res));
