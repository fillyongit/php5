<?php 
header('Content-type: text/plain; charset=ISO-8859-1');

$test = "prova \xC3\xA1"; // carattere à in utf8 (2 bytes), viene interpretato male

echo $test . "\n\r";

$test = "prova \xE1"; // carattere à in ISO-8859-1 in esadecimale (1 byte) viene interpretato bene

echo $test . "\n\r";

$test = "prova à"; // carattere à, viene interpretato bene

echo $test . "\n\r";

$test = "prova £"; // carattere £, viene interpretato bene

echo $test . "\n\r";


echo "\n\r";

echo "\n\r\n\r";
//mb_internal_encoding('iso-8859-1');
var_dump(mb_stripos("prova à", 'à')); // true
var_dump(mb_stripos("prova à", "\xC3\xA1")); // false
var_dump(mb_stripos("prova \xC3\xA1", "\xC3\xA1")); // true
var_dump(mb_stripos("prova \xC3\xA1", "à")); // false
var_dump(mb_stripos("prova \xE1", "à")); // false
var_dump(mb_stripos("prova à", "\xE1")); // false
var_dump(mb_stripos("prova \xE1", "\xE1")); // true
var_dump(mb_stripos("prova £", "£")); // true
echo "\n\r\n\r";

echo "=========== COMMENTO FINALE ============\n\r";
echo 'Sembra che l\'unico carattere mal interpretato dal browser quando si manda la pagina in iso-8859-1 sia quello rappresentato 
in esadecimale con 2 bytes.
E\' importantissimo l\'encoding del file. Infatti questo file è codificato in utf8 ed è questo che conta
per l\'interprete php che usa questa informazione per interpretate correttamente le stringhe e le funzioni che operano sulle stringhe. 
L\'altro lavoro lo fa appunto il browser che si vede arrivare una determinata codifica nell\'http.';