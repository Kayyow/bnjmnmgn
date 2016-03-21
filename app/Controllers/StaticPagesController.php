<?php
namespace App\Controllers;

class StaticPagesController extends AppController {

    public function information() {
        $this->render('information');
    }

    public function contact() {
        $this->render('contact');
    }

    public function sendContactEmail() {
        
    }

    public function catchCV() {
        $cv = ROOT . 'www/resources/download/cv_benjamin_maigne.pdf';
        if (file_exists($cv)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($cv).'"');
            header('Content-Length: ' . filesize($cv));
            readfile($cv);
        }
        $this->information();
    }
}