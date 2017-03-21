<?php

$message = "The Da Vinci Code is a 2003 mystery-detective novel by Dan Brown";

$message = strtoupper(str_replace(" ","",$message));

$pointer1 = 0;
$pointer2 = 1;
$ans = "";

if(isset($message[$pointer1])){
	$ans .= $message[$pointer1];
}

if(isset($message[$pointer2])){
	$ans = $ans.'-'.$message[$pointer2];
}

$current_pos = $pointer1+$pointer2;

while(isset($message[$current_pos])){
	$ans = $ans.'-'.$message[$current_pos];
	$pointer1 = $pointer2;
	$pointer2 = $current_pos;
}

echo $ans;

?>