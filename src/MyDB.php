<?php

/****************
An interface for a quick database connection.
****************/
namespace Mor\MyDB;

use \PDO;

class MyDB {
    private static $connection;

    public static function connect($server_name, $username, $password, $database_name) {
        try {
            if(self::$connection == null) {
                self::$connection = new PDO("mysql:host=$server_name; dbname=$database_name; charset=utf8", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return "Connected successfully";
            }
            else {
		return "Already connected to a database.";
	    }
        }
        catch(PDOException $e) {
            return "Connection failed: ".$e -> getMessage();
        }
    }   
}
