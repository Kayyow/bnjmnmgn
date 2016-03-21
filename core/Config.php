<?php
namespace Core;

class Config {

    private static $_instance;
    private $settings = [];

    public static function getInstance($file) {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file) {
        $this->id = uniqid();
        $this->settings = require($file);
    }

    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
}