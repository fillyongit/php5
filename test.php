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
// Gli oggetti non sono passati, assegnati restituiti per riferimento.
// Quello che viene passato/assegnato/restituito è una COPIA dell'identificatore dell'oggetto.
// Per passare per riferimento continuare ad usare l'&. In queso caso non viene passata la copia
// dell'identificatore ma il riferimento/alias all'identificare.
function swap(&$x, &$y) {
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

$a = new Holder('a');
$b = new Holder('b');
swap($a, $b);

echo $a->getValue() . ", " . $b->getValue() . "\n";

$a = array(1);
function add($b, &$ar) {
    $ar[] = 2;
}
add('', $a);
print '<hr>';
print_r($a);

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
print "<br>";
print "print null . 'dfs': ";
var_dump(null . 'dfs');

print '<hr>';
$a = 0;
$b = 1;
$a =+ $b;
print $a;

print '<hr>';
print "<h1>EXPLICIT TYPE CASTING</h1>";
$z = (int) '080000';
print $z;
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

print "<h1>ALTRO</h1>";
$a = 1;
	++$a;
	$a *= $a;
	echo $a--;

print '<hr />';
$a = array(1,2,3);
$b = array(1,2,3);
$c = array_unique(array_merge($a, $b));
print_r($c);

print '<hr>';
$a = array();
$a[0] = 1;
$a[14] = 3;
$a[4] = 2;

ksort($a);
$a = array_slice($a, 0);
var_dump($a);

print '<hr>';
$a = array(
		'1' => array(1,2),
		'2' => array(1,2,3,4),
		'3' => array(1,2,3,4,5)
);

usort($a, function($a,$b) {
	if (count($a) == count($b))
		return 0;
	return count($a) < count($b) ? 1 : -1;
});

print_r($a);
$b = reset($a);
print_r($b);

print '<hr>';
$a = array('3a' => 'A',  '1' => 'B', 'C', '2' => 'D');
print_r($a);
print count($a);
