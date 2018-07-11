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

    /**
     * //fungsi $table disini sbg alamat tabel yg akan diinputkan datanya
     */

    public function insert($table, $fields = array()) 
    {   
        // mengambil kolom
        $column = implode(", ", array_keys($fields)); // ini akan menggabungkan nilai array,- cek $column

        // mengambil nilai
        $valueArrays = array();
        $i = 0;
        
        foreach($fields as $key => $values) {
            if( is_int($values) ){
                $valueArrays[$i] = $values;
            } else {
                $valueArrays[$i] = "'" . $values . "'";
            }
            $i++;
        }
        

        $values = implode(", ", $valueArrays);

        
        //INSERT INTO $table (username, password) VALUES ('aku', '123') karena data nya hrs spt ini
        $query = "INSERT INTO $table ($column) VALUES ($values)";

        // die($query);
        
        if($this->mysqli->query($query)) return true;
        else return false;
    }
}