<?php

require_once __DIR__.'/../../core/Controller.php';
require_once '../core/Auth.php';

require_once __DIR__.'/../models/MyWorkout.php';
require_once __DIR__.'/../models/Student.php';

class MyWorkoutController extends Controller {
    

    public function __construct(){
        Auth::checkRole(['student']);
    }

    public function index(){
        $studentModel = new Students();
        $student = $studentModel->findByUserId(
            $_SESSION['user']['id']
        );
        if(!$student){
    die(
        "Nenhum aluno encontrado para o usuário ID: "
        . $_SESSION['user']['id']
    );
}
        $workoutModel = new MyWorkout();
        $workouts = $workoutModel->getByStudent(
            $student['id']
        );
        $this->view(
            'my_workouts/index',
            [
                'student' => $student,
                'workouts' => $workouts
            ]
        );
    }
    public function show(){

        $model = new MyWorkout();

        $data = $model->show(
            $_GET['id']
        );

        $this->view(
            'my_workouts/show',
            $data
        );
    }
}