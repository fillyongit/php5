<?php

class a
{
    private $name ;
    private $age ;

    function __construct($name, $age)
    {
        $this->name = $name ;
        $this->age = $age ;
    }

    function __sleep()
    {
        $vec = array("name") ;
        return $vec ;
    }
}

class b extends a
{
    private $last_name ;

    function __construct($name, $age ,$last_name)
    {
        parent::__construct($name, $age) ;
        $this->last_name = $last_name ;
    }

    function __sleep()
    {
        $array = parent::__sleep() ;

        array_push( $array, 'last_name' );
        return $array ;
    }

}

$ob = new b("michal" , 26 , "smith") ;
var_dump($ob) ;
$ob_ser = serialize($ob) ;
var_dump(unserialize($ob_ser)) ;