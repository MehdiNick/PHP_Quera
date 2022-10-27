<?php

class Italic extends RegexRule{

	public function replacement(){
return "<i>$2</i>";
	}

	 public function rule(){

	 	return "/(?<bold>\* *|_ *)([\w\d\s ]*)(\k<bold>)/i";
	 }
}



?>