<?php

class Header extends RegexRule{

	public function replacement(){
return "<h3>$1</h3>";
	}

	 public function rule(){

	 	return "/#{1,6}\s*(.*)/i";
	 }
}



?>