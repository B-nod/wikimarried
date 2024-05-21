<?php
require_once("../data/conn.php");
require_once("../data/groups.php");

$conn 					= new Dbconn();		
$groups					= new Groups();

$id = ($_GET['id'])>0 ? $_GET['id'] : 0;
$urlname = $_GET['value'];
//echo $groups -> isUnique($id, $urlname); 
if(!$groups -> isUnique($id, $urlname)){
echo $urlname.'-'.rand(1000,900);
} else{
	echo $urlname;	
}
?>