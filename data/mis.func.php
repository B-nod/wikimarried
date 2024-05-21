<?php
function getChars($char, $total, $symbol){
	$char = substr($char,0,$total);
$char_array = explode(" ", $char);
array_pop($char_array);
foreach($char_array as $c){
$new_char.= $c." ";
}
return $new_char.$symbol;
}
?>