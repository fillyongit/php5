<?php
$mysqli = new mysqli("dumpty.janus.it", "gcapro_2016", "9e9a1321363b7a54", "gcapro_estate_2016");

/* check connection */
if ($mysqli->connect_errno) {
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

/* Create table doesn't return a resultset */
if ($mysqli->query("INSERT INTO _test (nome) VALUES('test')") === TRUE) {
}

$mysqli->close();