<?php

class Link extends RegexRule{

	public function replacement(){
return "<a href=\"$2\">$1</a>";
	}

	 public function rule(){

	 	return "/\[(.*)\]\((.*)\)/i";
	 }
}




?>