<?php

ini_set("display_errors", "On");

class Database {
    private $config = [];
    private static $instance;
    private $connection;

    public function __construct() {
        $this->config = self::cargarConfiguracion();
        $this->connection = new PDO("mysql:host={$this->config["host"]};dbname={$this->config["db_name"]}", $this->config["user"], $this->config["password"]);
    }

    public static function cargarConfiguracion() {
        $jsonConfig = file_get_contents("../conf/db-conf.json");
        return json_decode($jsonConfig, true);
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}

?>
