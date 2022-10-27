<?php

class Code extends RegexRule{

	public function replacement(){
return "<code>$1</code>";
	}

	 public function rule(){

	 	return "/`(.*)`/i";
	 }
}





?>