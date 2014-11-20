<?php 
if ($_GET['file'] != '' && file_exists('images/' . str_replace('..', '', $_GET['file']))) {
 	header("Content-disposition: attachment; filename=" . basename($_GET['file']));
 	header("Content-type: application/pdf");
	
	readfile('images/' . str_replace('..', '', $_GET['file']));
}