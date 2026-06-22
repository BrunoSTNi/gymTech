<?php

require_once '../app/models/Exercise.php';
require_once '../core/Auth.php';

class ExerciseController extends Controller{
     public function __construct(){
        Auth::checkRole(['admin', 'trainer']);
    }
    public function index(){
        $model = new Exercise();
        $exercises = $model->all();
        $this->view('exercises/index',[
            'exercises'=>$exercises
        ]);
    }

    public function create(){
        $this->view('exercises/create');
    }

    public function store(){
        $model = new Exercise();
        $exercises = $model->find($_GET['id']);
        $this->view('exercises/edit',[
            'exercise'=>$exercises
        ]);
    }

    public function edit(){
        $model = new Exercise();
        $exercise = $model->find($_GET['id']);
        $this->view('exercises/edit',[
            'exercise'=>$exercise
        ]);
    }

    public function delete(){
        $model = new Exercise();
        $model->delete($_GET['id']);
        header("Location: ?controller=exercise&action=index");
    }
}