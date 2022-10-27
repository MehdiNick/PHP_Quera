<?php
$strings=[];
while(1){
$input=readline();
if($input==="END")
	break;
else
	$strings[]=$input;

}
$SecuredText = preg_replace("/(\D|^)(09)(\d{1})(\d{3})(\d{5})(\D|$)/",'$1$2$3***$5$6', $strings);


    $last_line= count($SecuredText);
	foreach ($SecuredText as $key=>$val) {
		echo "$val";
		if(!($key==$last_line-1)) 
		  echo"\n"; 
	}
?>

/*
okay motherfucker09305667042
babe$09305667042
oskol 4509305667042
ahmagh sd09305667042ds
aldang dasd09305667042$$$
bisharaf ds093056668978mm
09305667042aa
sa09305667042ads
asd09305667042
09305667042
ksdfjjklshf lskfslkdjf lkjadlk. apdjlaksjdla posiadpaod . aslkdj $#090930566704
hjgjhgjhg jhgjhj, kj!!
END
/*
