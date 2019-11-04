<?php

namespace WEO3;

require "../../vendor/autoload.php";

use PDO;

class DatabaseConnect {

    protected $dbInfo;
    public $dbc;

    public function __construct() {
        return $this->setConnection();
    }

    private function setConnection() {
        // simple check if already connected
        // if no connection, make new connection
        if($this->dbc == NULL) {

            $dsn = ":host=" . $this->dbInfo['dbhost'] .
            ";dbname=" . $this->dbInfo['dbname'] .
            ";charset=utf8";

            $this->dbInfo = require_once(dirname(__DIR__)."/config/local.config.php");

            $this->dbc = new \MySQLi($this->dbInfo['dbhost'], $this->dbInfo['dbuser'], $this->dbInfo['dbpass'], $this->dbInfo['dbname']);
            $this->dbc->set_charset("utf8mb4");

            if($this->dbc->connect_error) {
                die("Failed to connect: " . $this->dbc->connect_error);
            }
        }
    }

    public function getConnection() {
        return $this->dbc;
    }


}



