<?php 
class MyClass {
	
	public function __construct() {
		
	}
	
	public function run() {
		for($i=0; $i<=1000;$i++) {
			print $i;
		}
	}
	
	public function readFile() {
		$str = '';
		$fd = fopen('../images/test.pdf', 'r');
		while(!feof($fd)) {
			$str .= fread($fd, 4096);
		}
		fclose($fd);
		return $str;
	}
	
	public function triggerError() {
		trigger_error("Error", E_USER_WARNING);
	}
}