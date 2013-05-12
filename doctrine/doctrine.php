<?php
require 'Doctrine/ORM/Tools/Setup.php';

Doctrine\ORM\Tools\Setup::registerAutoloadPEAR();

foreach (PDO::getAvailableDrivers() as $driver) {
    echo $driver . PHP_EOL;
}
?>