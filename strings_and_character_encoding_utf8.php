<?php 
header('Content-type: text/plain; charset=utf-8');

$test = "prova \xC3\xA1"; // carattere à in utf8 (2 bytes), viene interpretato bene

echo $test . "\n\r";

$test = "prova \xE1"; // carattere à in ISO-8859-1 in esadecimale (1 byte) viene interpretato male

echo $test . "\n\r";

$test = "prova à"; // carattere à in ISO-8859-1, viene interpretato bene

echo $test . "\n\r";

$test = "prova £"; // carattere à in ISO-8859-1, viene interpretato bene

echo $test;

echo "\n\r\n\r";
mb_internal_encoding('utf8');
var_dump(mb_stripos("prova à", 'à')); // true
var_dump(mb_stripos("prova à", "\xC3\xA1")); // false
var_dump(mb_stripos("prova \xC3\xA1", "\xC3\xA1")); // true
var_dump(mb_stripos("prova \xC3\xA1", "à")); // false
var_dump(mb_stripos("prova \xE1", "à")); // false
var_dump(mb_stripos("prova à", "\xE1")); // false
var_dump(mb_stripos("prova \xE1", "\xE1")); // false
var_dump(mb_stripos("prova £", "£")); // true
echo "\n\r\n\r";

echo "=========== COMMENTO FINALE ============\n\r";
echo "Sembra che se il documento è mandato in utf8 (e quindi letto in utf8 dal browser), l'unico carattere mal interpretato è quello
espresso in iso-8859-1 in esadecimale. 
E' importantissimo l'encoding del file. Infatti questo file è codificato in utf8 ed è questo che conta
per l'interprete php che usa questa informazione per interpretare correttamente le stringhe e le funzioni che operano sulle stringhe. 
L'altro lavoro lo fa appunto il browser che si vede arrivare una determinata codifica nell'http.";