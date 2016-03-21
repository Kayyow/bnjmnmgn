<?php
namespace App\Controllers;

use \Core\Controllers\Controller;

class AppController extends Controller {

    protected $template = 'default';

    public function __construct() {
        $this->viewPath = ROOT . 'app/views/';
    }

    public function loadModel($model) {
        $this->$model = \App::getInstance()->getTable($model);
    }
}