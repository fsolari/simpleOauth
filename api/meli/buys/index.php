<?php

//echo "hola";
echo md5(uniqid(rand(), true))."-".md5(uniqid($email, true))."-".md5(uniqid(rand()+1, true));

?>