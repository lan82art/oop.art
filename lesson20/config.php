<?php

    class Config {
        function __construct() {
            $this->APP_PATH = dirname(dirname(__FILE__)) ;
        }
        public $APP_PATH ;
        //public $BASE_URL   = "CiB" ; // базовый УРЛ сайта
        public $DB_HOST    = "192.168.100.100" ; // имя хоста
        public $DB_USER    = "root" ;
        public $DB_PASS    = "KcR33sQjTAwagKh" ;
        public $DB_NAME    = "easycode" ;
    }

