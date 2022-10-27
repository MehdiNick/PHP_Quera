<?php

function color(&$ls)
{
    for($i=0;$i<count($ls);$i++) {
        if ($i==0 || $i==(count($ls)-1)){
foreach ($ls[$i] as &$y) {

   foreach ($y as &$z) {
    $z=1;
       
   }

}



        }
        
else {
 $jCount= count($ls[$i]);  
for($j=0; $j<$jCount;$j++){
if($j==0 || $j==$jCount-1){
    foreach ($ls[$i][$j] as &$z) {
        $z=1;
    }
}else{
    $kCount= count($ls[$i][$j]);
    for($k=0; $k<$kCount;$k++){
    if($k==0 || $k==$kCount-1){
$ls[$i][$j][$k]=1;
}else{
    $ls[$i][$j][$k]=0;
}
}

    }
}
}
}
}





$matrix = [
    [
        [3, 5, 13, 56],
        [0, 1, 165, 1],
        [-8, 78, 5, 8],
        [6, 5, 23, 45]
    ],
    [
        [1, 17, 5, 3],
        [1, 5, 1, 65],
        [6, 5, 5, -4],
        [0, 4, 3, 90]
    ],
    [
        [9, 9, 8, 0],
        [3, 5, 4, 8],
        [0, 5, 3, 9],
        [1, 4, 5, 7]
    ]
];

color($matrix);

for ($i = 0; $i < count($matrix); ++$i) {
    echo 'layer ' . ($i + 1) . ':' . "<br>";
    foreach ($matrix[$i] as $j) {
        foreach ($j as $k) {
            echo $k . ' ';
        }
        echo "<br>";
    }
}

?>