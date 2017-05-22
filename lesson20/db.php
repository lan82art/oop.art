<?php
    require_once "config.php" ;

    class Db extends Config {

        private $connection ;

        function __construct() {
            $this->open_connection() ;
        }

        private function open_connection() {
            $this->connection = mysqli_connect($this->DB_HOST,$this->DB_USER,$this->DB_PASS, $this->DB_NAME) or die("Ошибка соединения с базой данных: ". mysqli_error($this->connection));
            mysqli_query($this->connection,"set names utf8") or die("set names utf8 failed") ;
        }

        public function escape_string($value){
            return mysqli_real_escape_string($this->connection,$value);
        }

        public function sql($query) {

            $result = mysqli_query($this->connection,$query) ;
            if(!$result) {
                die("Ошибка запроса: ".mysqli_error($this->connection)) ;
            }
            return $result ;
        }
    }