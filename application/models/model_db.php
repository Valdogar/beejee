<?php 
require_once('./settings.php');
class Model_DbConnection extends Model
{
    
    protected static $host = Settings::HOST;
    protected static $user = Settings::USER; 
    protected static $password = Settings::PASSWORD; 
    protected static $dbname = Settings::DBNAME;
    public $mysqli;
    private static $_connection = false;

    public static function get()
    {
        if (!self::$_connection) {
            self::$_connection = new mysqli(self::$host,self::$user,self::$password,self::$dbname);
        }
        return self::$_connection;
    }
}