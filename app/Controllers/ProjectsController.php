<?php
namespace App\Controllers;

class ProjectsController extends AppController {

    public function __construct() {
        parent::__construct();
        $this->loadModel('project');
        $this->loadModel('category');
    }

    public function index() {
        $projects = $this->project->last();
        $categories = $this->category->all();
        $this->render('home', compact('projects', 'categories'));
    }

    public function indexWithCategory($label) {
        $category = $this->category->search($label);
        if ($category) {
            $projects = $this->project->lastByCategory($category->id);
            $categories = $this->category->all();
            $this->render('home', compact('projects', 'categories'));
        } else {
            $this->notFound();
        }
    }

    public function show($id) {
        $project = $this->project->find($id);
        if ($project) {
            $category = $this->category->find($project->category_id);
            $this->render('show', compact('project', 'category'));
        } else {
            $this->notFound();
        }
    }

    private function highlightKeywords($str, $index, $keyword) {
        $str = substr_replace($str, '</b>', $index + strlen($keyword), 0);
        return substr_replace($str, '<b>', $index, 0);
    }
}