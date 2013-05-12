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



?>