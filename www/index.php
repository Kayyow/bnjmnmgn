<?php
define('ROOT', dirname(__DIR__) . '/');
require '../app/App.php';
App::load();
$app = App::getInstance();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

if ($page === 'home') {
    $controller = new \App\Controllers\ProjectsController();
    if (isset($_GET['tri'])) {
        $tri = $_GET['tri'];
        $controller->indexWithCategory($tri);
    } else {
        $controller->index();
    }
} elseif ($page === 'show') {
    $controller = new \App\Controllers\ProjectsController();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $controller->show($id);
    } else {
        $controller->notFound();
    }
} elseif ($page === 'information') {
    $controller = new \App\Controllers\StaticPagesController();
    $controller->information();
} elseif ($page === 'catch-cv') {
    $controller = new \App\Controllers\StaticPagesController();
    $controller->catchCV();
} elseif ($page === 'contact') {
    $controller = new \App\Controllers\StaticPagesController();
    $controller->contact();
} elseif ($page === 'send-contact-email') {
    $controller = new \App\Controllers\StaticPagesController();
    $controller->sendContactEmail();
}
?>