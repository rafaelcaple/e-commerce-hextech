<?php

$con = mysqli_connect("localhost","root","","dbHextech");
    if (mysqli_connect_errno()){
	echo "Falha na conexão mysql: " . mysqli_connect_error();
	die();
	}
?>