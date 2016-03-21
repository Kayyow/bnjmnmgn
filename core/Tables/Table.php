<?php
namespace Core\Tables;

use \Core\Db\Database;

class Table {
    protected $table;
    protected $db;
    
    function __construct(Database $db) {
        $this->db = $db;
        if ($this->table == null) {
            $parts = explode('\\', get_class($this));
            $class = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class));
        }
    }

    public function all() {
        return $this->query("SELECT * FROM $this->table");
    }

    public function find($id) {
        return $this->query("SELECT * FROM $this->table WHERE id = ?", [$id], true);
    }

    public function query($statement, $attributes = null, $one = false) {
        $model = $this->getModelFromTable(get_class($this));
        if ($attributes) {
            return $this->db->prepare($statement, $attributes, $model, $one);
        } else {
            return $this->db->query($statement, $model, $one);
        }
    }

    private function getModelFromTable($table) {
        $class = $table;
        $parts = explode('\\', $class);
        $class_name = end($parts);
        $class = str_replace('Table', '', $class_name);
        return "App\Models\\$class";
    }
}