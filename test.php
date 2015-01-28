<?php 
namespace com\alessio\Test;

echo '<h1> PHP VERSION: ' . phpversion() . '</h1>';

include 'class.php';

print __NAMESPACE__ . "<br>";
foo::staticmethod();

print "<hr>";
print "<h1>REFERENCES</h1>";
print "<hr>";

print "<h3>Object passed by reference or by value?</h3>";
print "<hr>";

class A {
	public $foo = 1;
}

function foo2($obj)
{
	$obj->foo = 2;
}

$e = new A();
foo2($e);
print $e->foo;
print "<hr>";

class Holder {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }
}
// Nonostante diceno che gli oggetti vengono assegnati, passati, restituiti
// in questo caso è necessario prefissare gli argomenti con & per vedere
// trattati gli oggetti per riferimento.
function swap(&$x, &$y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

$a = new Holder('a');
$b = new Holder('b');
swap($a, $b);

echo $a->getValue() . ", " . $b->getValue() . "\n";

print "<hr>";
print "<h1>IMPLICIT TYPE CASTING</h1>";
print "<hr>";
print "print null + 1: ";
print null + 1;
print "<br>";
print "print \"0\" + 1: ";
print "0" + 1;
print "<br>";
print "print '0' + 1: ";
print '0' + 1;
print "<br>";
print "print true + 1: ";
print true + 1;
print "<br>";
print "print false + 1: ";
print false + 1;

print '<hr>';
$a = 0;
$b = 1;
$a =+ $b;
print $a;

print '<hr>';
$a = '1565';
$b = '1565-2';
var_dump(strcmp($a,$b));

$data[1571] = array(
	
	1534 =>  array('sportello' => 'conselice'),
	'1534.2' =>  array('sportello' => 'conselice'),
	0 => array('sportello' => ''),
	1541 =>  array('sportello' => 'fiorenzuola'),
	1447 => array('sportello' => 'marradi'),
	
);

    		array_walk($data, function(&$value, $key){
    			uksort($value, function($a, $b) {
    				// Tutto questo serve per assicurarsi che la riga con chiave uguale a 0
    				// sia messa in testa. Si lascia inalterato l'ordinamento degli elementi
    				// restanti, che è uguale a quello restituito dalla query sql.
    				if ($a == 0)
    					return -1;
    				else if ($b == 0)
    					return 1; 	
    				else {
    					if ($a == $b)
    						return 0;

    						return $a < $b ? -1 : 1;
    					
    				}   							
    			});
    		});

print_r($data);
print '<hr/>';
// Scope
print "<h1>BLOCK SCOPE</h1>";
$i=0;
while($i<5){
	$c = 'dentro il while block<br />';
	print $c;
	$i++;
}
print "fuori il while block: ";
var_dump($c);
?>