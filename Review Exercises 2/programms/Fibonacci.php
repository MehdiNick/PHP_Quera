<?php


function fib($n)
{
    $secondToLastNumber = 1;
    $lastNumber=0;

for($i=1; $i<=$n;$i++){ //this is a simple loop  - keeping the count of produced numbers
yield $secondToLastNumber+$lastNumber;
$lastNumber+=$secondToLastNumber;
$secondToLastNumber = $lastNumber-$secondToLastNumber;

///----------------
// Last= 0 / second= 1 ----> last=1
// last=1 / second=1 -----> last=2
// last=2 / second =1 -------> last = 3
//last=3 / second =1 ?
}
}

foreach (fib(6) as $number) {
    echo $number . "\n";
}


?>