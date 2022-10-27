<?php

namespace mamals{
class Male{
public function __construct(){
	echo "he has a penis";
}
}
}


namespace reptiles{
class Male{
	public function __construct(){
		echo "he doesn't have a penis";
	}
}
}

namespace{ // no code can be out of namespace, the dafault namespace is global

$cow = new reptiles\Male();
$aligator = new mamals\Male();

}

?>