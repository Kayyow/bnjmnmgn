<?php
namespace App\Models;

use \Core\Models\Model;

class Category extends Model {

    public function getUrl() {
        return '/?tri=' . str_replace(' ', '%20', $this->label);
    }
}