<?php

class Image extends RegexRule{

	public function replacement(){
return "<img src=\"$2\" alt=\"$1\">";
	}

	 public function rule(){

	 	return "/!\[(.*)\]\((.*)\)/i";
	 }
}




?>