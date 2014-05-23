<?php 
namespace com\alessio\Test;
include 'class.php';

print __NAMESPACE__ . "<br>";
foo::staticmethod();

print "<hr>";
print "<h1>REFERENCES</h1>";
print "<hr>";
$GLOBALS["baz"] = "cippo";

function foo2(&$var)
{
    $var =& $GLOBALS["baz"];
    // $var a questo punto è un'alias di $GLOBALS["baz"] e non è che fa puntare $bar a $GLOBALS["baz"],
    // per questo la reference non è un puntatore.
    $var = "42";
}
$bar = "ciao";
foo2($bar); 
print $bar;
print "<hr>";
print $GLOBALS["baz"];

print "<hr>";
print "<h3>Object passed by reference or by value?</h3>";
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