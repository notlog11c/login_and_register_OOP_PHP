<?php

class Database
{
    private static $INSTANCE = null;
    
    private $mysqli,
            $HOST = 'localhost',
            $USER = 'root',
            $PASS = '123',
            $DBNAME = 'tutorial';

    public function __construct()
    {
        $this->mysqli = new mysqli( $this->HOST, $this->USER, $this->PASS, $this->DBNAME );// connect db
        if ( mysqli_connect_error() ){
            die ('gagal konek');
        }
    }   

    public static function getInstance()
    {
        if (!isset( self::$INSTANCE )){
            self::$INSTANCE = new Database();
        }
        
        return self::$INSTANCE;
    }
}

$db = Database::getInstance();

var_dump($db);