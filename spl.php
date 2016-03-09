<?php 
$a = new ArrayObject(array(), ArrayObject::ARRAY_AS_PROPS);
$a['arr'] = 'array data';
$a->prop = 'prop data';

$b = new ArrayObject(); // Il comportamento di default è STD_PROP_LIST che tratta le proprietà veramente come prprietà quindi non elencabili tramite foreach
$b['arr'] = 'array data';
$b->prop = 'prop data';

var_dump($a);
print $a['arr'] . ' ' . $a['prop']; // $b['prop']  è accebile in questo modo avendo specificato ArrayObject::ARRAY_AS_PROPS.
print "<hr>";
var_dump($b);
print $b['arr'] . ' ' . $b['prop']; // $b['prop'] non è accebile in questo modo ma solo come $b->prop.

print "<hr>";
foreach($a as $k=>$v) {
	print $k.' ' . $v . '<br>';
}

print "<hr>";
foreach($b as $k=>$v) {
	print $k.' ' . $v . '<br>';
}