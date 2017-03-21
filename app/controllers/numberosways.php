<?php

$a = "ABCDE";
$b = "CDEAB";

echo get_sol($a,$b);



function get_sol($a, $b){

	$n = sizeof($a);
	$m = sizeof($b);

	if($n!=$m)
		return -1;

	if(strcmp($a, $b))
		return 0;

	$j=$n-1;
	$i=$n-1;

	while($j!=-1){}

		if($b[$i]==$a[$j]){
			$j--;
			$i--;
		}
		else{
			$j--;
		}
	}
	$i+1;
	return -1;
}


















function get_sol($a, $b){

	$n = sizeof($a);
	$m = sizeof($b);

	if($n!=$m)
		return -1;

	if(strcmp($a, $b))
		return 0;

	
	for($size=$n-1; $size>=0; $size++){

		if(checksequence($a, $b, $size, $n)){
			return $n-$size;
		}

	}
	return -1;
}


function checksequence($a,$b,$size,$n){

	$j=$n-$size;
	$count=0;
	for($i=0; $i<$n; $i++){

		if($a[$i] == $b[$j]){
			$j++;
			$count++;
		}
	}
	if(count==$size){
		return TRUE;
	}
}