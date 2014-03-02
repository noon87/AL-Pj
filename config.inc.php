<?php
	$hostname = 'localhost';        // MySQL hostname
	$dbname   = 'nan-affinitylive-pj'; // database name.
	$username = 'root';             // database username.
	$password = 'xelrbornpcjj';                 // database password

	// connect to host
	mysql_connect($hostname, $username, $password) or DIE('Connection failed!');
	// Select the database
	mysql_select_db($dbname) or DIE('Database name is not available!');
?>