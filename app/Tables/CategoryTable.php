<?php
namespace App\Tables;

use \Core\Tables\Table;

class CategoryTable extends Table {
    protected $table = 'categories';

    public function search($label) {
        return $this->query("SELECT * FROM $this->table WHERE label = ?", [$label], true);
    }
}