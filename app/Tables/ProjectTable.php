<?php
namespace App\Tables;

use \Core\Db\MySQLDatabase;
use \Core\Tables\Table;

class ProjectTable extends Table {
    protected $table = 'projects';

    public function lastByCategory($category_id) {
        return $this->query("SELECT * FROM $this->table WHERE category_id = ? ORDER BY date DESC", [$category_id]);
    }

    public function last() {
        return $this->query("SELECT * FROM $this->table ORDER BY date DESC");
    }
}