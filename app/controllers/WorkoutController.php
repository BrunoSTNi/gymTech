<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Workout.php';
require_once __DIR__ . '/../models/Student.php';
require_once '../core/Auth.php';

class WorkoutController extends Controller{

    public function __construct(){
            Auth::checkRole(['admin', 'trainer']);
        }
    //Listagem
    public function index(){
        $workoutModel = new Workout();
        $workouts = $workoutModel->all();
        $this->view('workouts/index',[
            'workouts' => $workouts
        ]);
    }

    //Form Create
    public function create(){
        $studentModel = new Students();
        $students = $studentModel->all();
        $this->view('workouts/create', [
            'students' => $students
        ]);
    }

    //Store
    public function store(){
        if($_POST['training_days'] < 1 || $_POST['training_days'] > 7){
            die("Dias de treino devem estar entre 1 e 7.");
        }
        $workoutModel = new Workout();
        $workoutModel->create($_POST);
        header('Location: ?controller=workout&action=index');
        exit;
    }

    //Edit
    public function edit(){
        $id = $_GET['id'];
        $workoutModel = new Workout();
        $studentModel = new Students();
        $workout = $workoutModel->find($id);
        $students = $studentModel->all();
        $this->view('workouts/edit', [
        'workout' => $workout,
        'students' => $students
        ]);
    }

    //Update
    public function update(){
        if ($_POST['training_days'] < 1 || $_POST['training_days'] > 7) {
            die("Dias de treino devem estar entre 1 e 7.");
        }
        $id = $_GET['id'];
        $workoutModel = new Workout();
        $workoutModel->update($id, $_POST);
        header('Location: ?controller=workout&action=index');
        exit;
    }

    //Delete
    public function delete(){
        $id = $_GET['id'];
        $workoutModel = new Workout();
        $workoutModel->delete($id);
        header('Location: ?controller=workout&action=index');
        exit;
    }

    public function show(){
        require_once __DIR__ . '/../models/WorkoutExercise.php';
        $workoutId = $_GET['id'];
        $workoutModel = new Workout();
        $workout = $workoutModel->find($workoutId);
        $exerciseModel = new workoutExercise();
        $exercises = $exerciseModel->allByWorkout($workoutId);
        $this->view('workouts/show',[
            'workout'=>$workout,
            'exercises'=>$exercises
        ]);
    }
}