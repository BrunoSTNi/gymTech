<?php

require_once '../app/models/Exercise.php';
require_once '../core/Auth.php';

class ExerciseController extends Controller{
     public function __construct(){
        Auth::checkRole(['admin', 'trainer']);
    }
    public function index(){
        $model = new Exercise();
        if(
            !empty($_GET['search']) ||
            !empty($_GET['muscle_group']) ||
            !empty($_GET['difficulty'])
        ){
            $exercises = $model->search(
                $_GET['search'] ?? '',
                $_GET['muscle_group'] ?? '',
                $_GET['difficulty']?? ''
            );
        }else{
            $exercises = $model->all();
        }
        $this->view('exercises/index',[
                'exercises'=>$exercises
        ]);
    }


    public function create(){
        $this->view('exercises/create');
    }

    public function store(){
        $model = new Exercise();
        $model->create([
            'name' => $_POST['name'],
            'muscle_group' => $_POST['muscle_group'],
            'equipment' => $_POST['equipment'],
            'difficulty' => $_POST['difficulty'],
            'objective' => $_POST['objective'],
            'video_url' => $_POST['video_url'],
            'description' => $_POST['description'],
        ]);
        header(
            'Location: ?controller=exercise&action=index'
        );
        exit;
    }

    public function edit(){
        $model = new Exercise();
        $exercise = $model->find($_GET['id']);
        $this->view('exercises/edit',[
            'exercise'=>$exercise
        ]);
    }


    public function update(){
        $model = new Exercise();
        $model->update(
            $_GET['id'],
            $_POST
        );

        header(
            'Location:?controller=exercise&action=index'
        );
        exit;
    }

    public function delete(){
        $model = new Exercise();
        $model->delete($_GET['id']);
        header(
            'Location: ?controller=exercise&action=index'
        );
        exit;
    }



}