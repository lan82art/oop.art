<?php
    class Config {
        function __construct() {
            $this->APP_PATH = dirname(dirname(__FILE__)) ;
        }
        protected $APP_PATH ;
        protected $DB_HOST    = "localhost" ;
        protected $DB_USER    = "root" ;
        protected $DB_PASS    = "Creation" ;
        protected $DB_NAME    = "easycode" ;
    }