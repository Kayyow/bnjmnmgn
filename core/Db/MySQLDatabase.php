<?php
namespace Core\Db;

use \PDO;

class MySQLDatabase extends Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = '127.0.0.1') {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO() {
        if ($this->pdo == null) {
            $pdo = new PDO("mysql:dbname=$this->db_name;host=$this->db_host;charset=utf8", $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($statement, $class, $one = false) {
        $query = $this->getPDO()->query($statement);
        $datas = $one ? $query->fetch(PDO::FETCH_CLASS, $class) : $query->fetchAll(PDO::FETCH_CLASS, $class);
        return $datas;
    }

    public function prepare($statement, $attributes, $class, $one = false) {
        $query = $this->getPDO()->prepare($statement);
        $query->execute($attributes);
        $query->setFetchMode(PDO::FETCH_CLASS, $class);
        $datas = $one ? $query->fetch() : $query->fetchAll();
        return $datas;
    }
}