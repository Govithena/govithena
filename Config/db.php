<?php

class Database
{
    // private $db_host = "localhost";
    // private $db_user = "root";
    // private $db_password = "";
    // private $db_name = "govithena";
    private static $bdd = null;

    private function __construct()
    {
    }

    public static function getBdd()
    {

        if (is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=govithenadb_1", "root", "");
            // self::$bdd = new PDO("mysql:host=govithena.mysql.database.azure.com;dbname=govithenadatabase", "govithena_admin", "14Thena23#");
        }
        return self::$bdd;
    }
}
