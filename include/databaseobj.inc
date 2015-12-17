<?php

// inc/DbUtil.inc 

class DatabaseObj
{

    public $db = NULL;
    // DB Connection Parameters: Modify for specific project 
    public $host = "localhost";
    public $user = "admin"; // or individual MySQL user name 
    public $pwd = "thespud10"; // with quotesdb permissions 
    public $defaultDB = "spud";

    function __construct() // constructor - not needed for DbUtil 
    {
        
    }

    // Connect to DBServer, Select specified or default DB 
    // If existing connection, then reset default database 
    // Returns open MySQLi database object 
    function Open($useDB = "")
    {
        // New connection? 
        if ($this->db == NULL)
        {
            if ($useDB != "") // use specified default DB, if provided 
                $this->defaultDB = $useDB;

            $this->db = @new mysqli($this->host, $this->user, $this->pwd, $this->defaultDB);

            if ($this->db->connect_errno)
                die("Could not connect to database. " .
                        "Error[{$this->db->connect_errno}]");
        }
        // Connection exists already, reset default database, if provided 
        elseif (($useDB != "") && ($useDB != $this->defaultDB))
        {
            // Use same connection, but change default DB 
            $this->defaultDB = $useDB;
            @$this->db->select_db($this->defaultDB);
        }
        return $this->db;
    }

    function Close()
    {
        if ($this->db != NULL)
        {
            @$this->db->close();
            $this->db = NULL;
        }
    }

    // Add ' ' quotes around string value. 
    // Replace embedded quote with quote quote 
    function DBQuotes($strSQL)
    {
        // Normal version 
        if (!get_magic_quotes_gpc())
            return "'" . addslashes($strSQL) . "'";

        return "'" . $strSQL . "'";
    }
}

?>