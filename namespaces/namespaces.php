<?php 
namespace A\B\C;

const E_ERROR = 45;
function strlen($str)
{
	return \strlen($str) - 1;
}

echo E_ERROR, "\n"; // prints "45"
echo INI_ALL, "\n"; // prints "7" - falls back to global INI_ALL


echo strlen('hi'), "\n"; // prints "1"
if (is_array('hi')) { // prints "is not array". Fall back to global function
	echo "is array\n";
} else {
	echo "is not array\n";
}

/*
 * Inside a namespace, when PHP encounters an unqualified Name in a class name, function or constant context, it resolves 
 * these with different priorities. Class names always resolve to the current namespace name. 
 * Thus to access internal or non-namespaced user classes, one must refer to them with their fully qualified Name.
 */

class Exception extends \Exception {}

$a = new Exception('hi'); // $a is an object of class A\B\C\Exception
$b = new \Exception('hi'); // $b is an object of class Exception

$c = new \ArrayObject(array('uno','due'), \ArrayObject::ARRAY_AS_PROPS); // Corretto
print $c->count();
foreach($c as $v) {
	var_dump($v);
}
$c = new ArrayObject(); // fatal error, class A\B\C\ArrayObject not found