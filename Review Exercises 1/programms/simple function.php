<?php
 class SimpleTest
{	

	public function simpleFunction($numbers){
		foreach ($numbers as &$number) {
			$number = $number**2;
		}

		return $numbers;
	}

	public function assertEquals($nums1,$nums2){
		$flag = true;
		for($i=0;$i<count($nums1);$i++){
			if($nums1[$i]!=$nums2[$i]){
				$flag=false;
				break;
			}
		}
		return $flag;
	}
    public function testSimpleFunction()
    {
        $numbers = [1, 5, 6, 8, 10, 11];
        $result = $this->assertEquals($this->simpleFunction($numbers), [1, 25, 36, 64, 100, 121]);
        return $result;
    }
}
$j = new SimpleTest();
var_dump($j->testSimpleFunction());
?>