<?php
/**
*   PDO Connection Class
*
*   PHP Doc: https://www.php.net/manual/pt_BR/pdo.setattribute.php
*
*   @author Edson Melo de Souza
*
*/

namespace Api\Database;

class Database
{
    # Connection instance
    protected static $db;

    # PDO config vars
    private static $db_type = 'mysql';
    private static $db_hostname = 'localhost';
    private static $db_name = 'u105770438_apirestgit';
    private static $db_user = 'u105770438_apirestgit';
    private static $db_password = '#Patinhas123';

    # Constructor
    function __construct(){
        try {
            self::$db = new \PDO(
                self::$db_type . ":host=" .
                self::$db_hostname . ";dbname=" .
                self::$db_name, 
                self::$db_user, 
                self::$db_password
            );
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$db->setAttribute(\PDO::ATTR_PERSISTENT, FALSE);
            self::$db->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf-8");
            self::$db->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
            self::$db->exec("SET NAMES utf8");
            
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }

    # Crate a new connection if not exist
    public static function connection(){
        if (!self::$db) {
            new Database();
        }
        # Return connection
        return self::$db;
    }

    # Close connection
    function __destruct() {
        try {
            $this->conn = null;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}
