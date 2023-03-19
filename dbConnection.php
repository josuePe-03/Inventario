<?php

	//  Conexión con MySQL

	$sernamename = "localhost";
	$username    = "id19957035_base";
	$passoword   = "G22LfD[fst\p|+td";
	$databasename= "id19957035_hospital";

	// Create database connection
	$con = mysqli_connect($sernamename, $username,$passoword,$databasename);

	// Check connection
	if ($con->connect_error) {
		die("Connection failed". $con->connect_error);
	}

?>