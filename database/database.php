<?php

    require('config_db.php');

    class database  {
        private $host = DB_HOST;
        private $username = DB_USERNAME;
        private $password = DB_PASSWORD;
        private $db   = DB_NAME;
        private $koneksi;
    
        public function konek() {
            $hubung = mysqli_connect($this->host, $this->username, $this->password, $this->db);
    
            if (!$hubung) {
                die('Database tidak terhubung!!!');
            } else {
                $this->koneksi = $hubung;
            }
            return $this->koneksi;
        }
    
        public function close() {
            mysqli_close($this->koneksi);
        }
    
    }

?>