<?php
error_reporting(0);
	class Dbconn{
		var $host;
		var $uname;
		var $psw;
		var $dbname;
		var $links;
		var $db;

		function __construct(){

			$this->host =  "localhost";
			$this->uname = "wikimarried";// wwwfly_root
			$this->psw = "Wikimarried@2024";	//	!@#$%^&*
			$this->dbname = "wikimarrieds"; //wwwfly_db
die('test');

			$this->links = mysqli_connect($this->host,$this->uname,$this->psw) or die("Sorry, couldnot connect to MySQL Server");
			$this->db = mysqli_select_db($this->links,$this->dbname) or die("Sorry, couldnot find database");
		}

		function exec($sqlMain){
			//echo $sqlMain;
			//$result = mysql_query($sqlMain,$this->links) or die("You have some problem with your data");
			$result = mysqli_query($this->links, $sqlMain) or die(mysqli_error($this->links));
			//$result = mysql_query($sqlMain,$this->links);
			return $result;
		}

		function exec2($sqlMain){
			//echo $sqlMain;
			$result = @mysqli_query($this->links, $sqlMain);
			return $result;
		}

		function numRows($result)
		{
			return mysqli_num_rows($result);
		}

		function affRows()
		{
			return mysqli_affected_rows($this->links);
		}

		function insertId()
		{
			return mysqli_insert_id($this->links);
		}

		function fetchArray($result)
		{
			return mysqli_fetch_array($result);
		}

		function fetchObject($result)
		{
			return mysqli_fetch_object($result);
		}

		function fetchAssoc($result)
		{
			return mysqli_fetch_assoc($result);
		}

		function commit()
		{
			return ($this -> exec("Commit"));
		}

		function begin()
		{
			return ($this -> exec("Begin"));
		}

		function rollback()
		{
			return ($this -> exec("Rollback"));
		}

		function Dbclose()
		{
			mysqli_close($this->links);
		}
	}	//Dbconn ends
?>
