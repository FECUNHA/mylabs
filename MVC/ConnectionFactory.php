<?php

class ConnectionFactory {

    private $dbHost;
    private $dbDatabase;
    private $dbUser;
    private $dbPassword;
    private $conn;
    private $dbTime;
    static $instance = NULL;

    private function __clone() {
        
    }

    public static function getInstance() {
        try {
            if (is_null(self::$instance))
                self::$instance = new ConnectionFactory();
        } catch (PDOException $ex) {
            throw $ex;
        }

        return self::$instance;
    }

    private function __construct() {

        //setar variaveis

        $this->dbHost = 'localhost';
        $this->dbUser = 'root';
        $this->dbPassword = "";
        $this->dbDatabase = "db_lab";

        $this->dbTime = microtime(true); //db time starts

        try {
            $this->conn = new PDO("mysql:host={$this->dbHost}; dbname={$this->dbDatabase}", $this->dbUser, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    public function dbCloseConect() {
            unset($this->conn);
    }

    public function dbInsertSql($sql, $params) {
        $result = "";
        try {
            $q = $this->conn->prepare($sql);
            $result = $q->execute($params);
        } catch (PDOException $ex) {
            throw $ex;
        }

        return $result;
    }

    public function dbInsertSqlLastId($sql, $params) {
        $result = "";
        try {
            $q = $this->conn->prepare($sql);
            $q->execute($params);
            $result = $this->conn->lastInsertId();
        } catch (PDOException $ex) {
            echo "Something is wrong here! <b>" . $ex->getMessage() . "</b>";
            throw $ex;
        }

        return $result;
    }

    public function dbUpdatesql($sql, $params) {
        $result = "";
        try {

            $q = $this->conn->prepare($sql);
            $q->execute($params);
            $result = $q->rowCount();
        } catch (PDOException $ex) {
            //echo "dbUpdatesql"  .$ex->getMessage() . __CLASS__ . "</b>";
            throw new PDOException($ex->getMessage() . " - className:" . __CLASS__);
        }

        return $result;
    }

    public function dbDelete($sql, $id) {

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function dbSelect($sql, $arrayParams = null) {
        $query = $this->conn->prepare($sql);
        $query->execute($arrayParams);

        return $query;
    }

}

