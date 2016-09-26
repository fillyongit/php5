<?php 
//include 'class.php';

spl_autoload_register(function ($class_name) {
	include strtolower($class_name) . '.php';
});

$c = new MyClass();
$c->run();
$c->readFile();
$c->triggerError();

print $a; //Notice.