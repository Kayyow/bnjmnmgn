<?php
use Core\Config;
use Core\Db\MySQLDatabase;

class App {
    public $title = 'Benjamin Maigné';

    private $db_instance;

    private static $_instance;

    public static function getInstance() {
        return self::$_instance == null ? new App() : self::$_instance;
    }

    public static function load() {
        session_start();
        require ROOT . 'app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . 'core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name) {
        $class = '\\App\\Tables\\' . ucfirst($name) . 'Table';
        return new $class($this->getDb());
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . 'config/config.php');
        if ($this->db_instance == null) {
            $this->db_instance = new MySQLDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }
}