<?php
$id = $_GET['id'];
$value = $_GET['value'];
$value = str_replace("!", "", $value);
$value = str_replace("@", "", $value);
$value = str_replace("#", "", $value);
$value = str_replace("$", "", $value);
$value = str_replace("%", "", $value);
$value = str_replace("^", "", $value);
$value = str_replace("&", "", $value);
$value = str_replace("*", "", $value);
$value = str_replace("(", "", $value);
$value = str_replace(")", "", $value);
$value = str_replace("_", "", $value);
$value = str_replace("{", "", $value);
$value = str_replace("}", "", $value);
$value = str_replace("[", "", $value);
$value = str_replace("]", "", $value);
$value = str_replace(":", "", $value);
$value = str_replace(";", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("\"", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("<", "", $value);
$value = str_replace(",", "", $value);
$value = str_replace(">", "", $value);
$value = str_replace(".", "", $value);
$value = str_replace("?", "", $value);
$value = str_replace("/", "", $value);
$value = str_replace("\\", "", $value);
$value = str_replace("'", "", $value);
$value = str_replace("|", "", $value);
$value = str_replace("  ", " ", $value);

$value = trim($value);
$value = str_replace(" ", "-", $value);
$value = strtolower($value);
include("../data/conn.php");
$conn = new Dbconn;
$sql="SELECT category_title as url from cities WHERE category_title='$value' ";
if($id>0)
$sql.="AND id<>'$id'";
$sql.="UNION SELECT urltitle as url FROM blog WHERE urltitle ='$value'";
if($id>0)
$sql.="AND id<>'$id'";
$sql.="UNION SELECT urlname as url FROM groups WHERE urlname ='$value'";
if($id>0)
$sql.="AND id<>'$id'";

$result = $conn->exec($sql);
if($conn->numRows($result)>0)
$value = $value."-".rand(99,9999);

echo $value;



?>