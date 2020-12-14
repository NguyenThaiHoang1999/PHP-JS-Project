<?php

require 'config.php';

class DB {

    public static $connection = NULL;

    public function __construct() {
        // thuc hien ket noi data
        if (!self::$connection) {
            self::$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
    }
// gui cau truy van cho database
    public function querry($sql) {
        return mysqli_query(self::$connection, $sql);
    }
//ham truy van 
    public function select($sql) {
        // thuc hien cau truy van luu vao data
        $data = $this->querry($sql);
        //
        $rows = array();
        //lay ket qua sau khi truy van luu vao row
        while ($row = mysqli_fetch_array($data)) {
            $rows[] = $row;
        }
        // tra ve tat ca san pham
        return $rows;
    }

    //ngat ket noi database
    function disconnect_db()
{    
   
    // Nếu đã kêt nối thì thực hiện ngắt kết nối
    if (!self::$connection){
        mysqli_close(self::$connection);
    }
}

}
