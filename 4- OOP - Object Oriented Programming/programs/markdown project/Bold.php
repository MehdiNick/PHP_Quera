<?php

class Bold extends RegexRule{

	public function replacement(){
return "<b>$2</b>";
	}

	 public function rule(){

	 	return "/(?<bold>\*\* *|__ *)([\w\d\s ]*)(\k<bold>)/i";
	 }
}





?>