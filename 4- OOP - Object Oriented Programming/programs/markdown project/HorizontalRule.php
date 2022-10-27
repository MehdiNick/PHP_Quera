<?php

class HorizontalRule extends RegexRule{

	public function replacement(){
return "<hr>";
	}

	 public function rule(){

	 	return "/-{3,}/i";
	 }
}





?>