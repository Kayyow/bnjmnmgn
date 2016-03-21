<?php
namespace App\Models;

use \Core\Models\Model;

class Project extends Model {

    public function getFormattedDate() {
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
        return utf8_encode(strftime('%d %B %Y', strtotime($this->date)));
    }
    
}