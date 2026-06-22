<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once '../app/models/WorkoutExercise.php';
require_once '../app/models/Workout.php';
require_once '../app/models/Exercise.php';

class WorkoutExerciseController extends Controller{
    public function create(){
        $workoutId = $_GET['workout_id'];
        $exerciseModel = new Exercise();
        $exercises = $exerciseModel->all();
        $this->view(
            'workout_exercises/create',[
                'workout_id'=>$workoutId,
                'exercises'=>$exercises
            ]
        );
    }

    public function store(){
        $model = new WorkoutExercise();
        $model->create($_POST);
        header(
            "Location: ?controller=workout&action=show&id=" . $_POST['workout_id']
        );
        exit;
    }

    public function delete(){
        $model = new WorkoutExercise();
        $model->delete($_GET['id']);
        header(
            "Location: ?controller=workout&action=show&id=" . 
            $_GET['workout_id']
        );
        exit;
    }
}