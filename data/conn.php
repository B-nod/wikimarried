<?php
error_reporting(0);

class Dbconn
{
    var $host;
    var $uname;
    var $psw;
    var $dbname;
    var $links;
    var $db;

    function __construct()
    {

        $this->host =  "localhost";
        $this->uname = "wikimarried";
        $this->psw = "Wikimarried@2024";
        $this->dbname = "wikimarried";

        $this->links = new mysqli($this->host, $this->uname, $this->psw, $this->dbname);

        if ($this->links->connect_error) {
            die("Sorry, could not connect to MySQL Server: " . $this->links->connect_error);
        }
    }

    function exec($sqlMain)
    {
        $result = $this->links->query($sqlMain) or die($this->links->error);
        return $result;
    }

    function exec2($sqlMain)
    {
        $result = @$this->links->query($sqlMain);
        return $result;
    }

    function numRows($result)
    {
        return $result->num_rows;
    }

    function affRows()
    {
        return $this->links->affected_rows;
    }

    function insertId()
    {
        return $this->links->insert_id;
    }

    function fetchArray($result)
    {
        return $result->fetch_array();
    }

    function fetchObject($result)
    {
        return $result->fetch_object();
    }

    function fetchAssoc($result)
    {
        return $result->fetch_assoc();
    }

    function commit()
    {
        return ($this->exec("Commit"));
    }

    function begin()
    {
        return ($this->exec("Begin"));
    }

    function rollback()
    {
        return ($this->exec("Rollback"));
    }

    function Dbclose()
    {
        $this->links->close();
    }
} //Dbconn ends
?>
