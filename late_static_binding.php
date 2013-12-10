<?php
/**
 * More precisely, late static bindings work by storing the class named in the last "non-forwarding call". 
 * In case of static method calls, this is the class explicitly named (usually the one on the left of the :: operator); 
 * in case of non static method calls, it is the class of the object. A "forwarding call" is a static one that is introduced 
 * by self::, parent::, static::, or, if going up in the class hierarchy, forward_static_call(). 
 * The function get_called_class() can be used to retrieve a string with the name of the called class and static:: introduces its scope.
 * 
 * @author Alessio
 *
 */

//------------ static context --------------
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
    	var_dump(get_called_class());
        static::who(); // Here comes Late Static Bindings, 
        // instead of use of
        // self::who();
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}

B::test();
echo  "<hr />";
//------------ non-static context --------------
class C {
	private function foo() {
		echo __CLASS__ . " success!\n";
	}
	public function test() {
		$this->foo();
		static::foo();
	}
}

class D extends C {
	/* foo() will be copied to D, hence its scope will still be C and
	 * the call be successful */
}

class E extends C {
	private function foo() {
		/* original method is replaced; the scope of the new one is C */
	}
}

$d = new D();
$d->test();
$e = new E();
//$e->test();   //fails

print '<hr />';

class F {
	public static function foo() {
		static::who();
	}

	public static function who() {
		echo __CLASS__."\n";
	}
}

class G extends F {
	public static function test() {
		F::foo();
		parent::foo();
		self::foo();
	}

	public static function who() {
		echo __CLASS__."\n";
	}
}
class H extends G {
	public static function who() {
		echo __CLASS__."\n";
	}
}

H::test();