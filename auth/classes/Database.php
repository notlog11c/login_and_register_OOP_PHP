<?php

class Database{

    private static $INSTANCE;

    private $mysqli,
            $HOST = 'localhost',
            $USER = 'root',
            $PASS = '123',
            $DBNAME = 'tutorial';

    public function __construct()
    {
        $this->mysqli = new mysqli( $this->HOST,$this->USER, $this->PASS, $this->DBNAME );
        if( mysqli_connect_error() ){
            die('Gagal Konek Ke Database');
        }
    }

    /**
     * Singleton Pattern,
     * Agar tidak meminta koneksi berulang2 ke database
     */

    public static function getInstance()
    {
        if( !isset(self::$INSTANCE) ) {
            self::$INSTANCE = new Database();
        }

        return self::$INSTANCE;
    }
}