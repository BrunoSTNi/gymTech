<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Workout.php';
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/WorkoutExercise.php';
require_once '../core/Auth.php';

class WorkoutController extends Controller{
    public function __construct(){
        Auth::checkRole(['admin', 'trainer']);
    }

    public function index(){
        $model = new Workout();
        $workouts = $model->all();
        $this->view(
            'workouts/index',
            [
                'workouts' => $workouts
            ]
        );
    }

    public function create(){
        $studentModel = new Students();
        $students = $studentModel->all();
        $this->view(
            'workouts/create',
            [
                'students' => $students
            ]
        );
    }

    public function store(){
        if (
            $_POST['training_days'] < 1 ||
            $_POST['training_days'] > 7
        ) {
            die('Dias de treino devem estar entre 1 e 7.');
        }
        $model = new Workout();
        $model->create([
            'student_id'   => $_POST['student_id'],
            'workout_name' => $_POST['workout_name'],
            'objective'    => $_POST['objective'],
            'training_days'=> $_POST['training_days'],
            'trainer_id'   => $_SESSION['user']['id']
        ]);
        header(
            'Location: ?controller=workout&action=index'
        );
        exit;
    }


    public function edit(){
        $id = $_GET['id'];
        $workoutModel = new Workout();
        $studentModel = new Students();
        $workout = $workoutModel->find($id);
        if (!$workout) {
            die('Treino não encontrado.');
        }
        $students = $studentModel->all();
        $this->view(
            'workouts/edit',
            [
                'workout' => $workout,
                'students' => $students
            ]
        );
    }

    public function update(){
        if (
            $_POST['training_days'] < 1 ||
            $_POST['training_days'] > 7
        ) {
            die('Dias de treino devem estar entre 1 e 7.');
        }
        $model = new Workout();
        $model->update($_POST);
        header(
            'Location: ?controller=workout&action=index'
        );
        exit;
    }

    public function delete(){
        $id = $_GET['id'];
        $model = new Workout();
        $model->delete($id);
        header(
            'Location: ?controller=workout&action=index'
        );
        exit;
    }

    public function show(){
        $workoutId = $_GET['id'];
        $workoutModel = new Workout();
        $workout = $workoutModel->find($workoutId);
        if (!$workout) {
            die('Treino não encontrado.');
        }
        $exerciseModel = new WorkoutExercise();
        $exercises = $exerciseModel->allByWorkout(
            $workoutId
        );
        $this->view(
            'workouts/show',
            [
                'workout' => $workout,
                'exercises' => $exercises
            ]
        );
    }

    public function manageExercises(){
        require_once '../app/models/Exercise.php';
        require_once '../app/models/WorkoutExercise.php';

        $workoutId = $_GET['id'];
        $workoutModel = new Workout();
        $exerciseModel = new Exercise();
        $workoutExerciseModel = new WorkoutExercise();
        $workout = $workoutModel->find($workoutId);
        $allExercises = $exerciseModel->all();
        $currentExercises =
            $workoutExerciseModel->allByWorkout(
                $workoutId
            );
        $this->view(
            'workouts/manageExercises',
            [
                'workout' => $workout,
                'allExercises' => $allExercises,
                'currentExercises' => $currentExercises
            ]
        );
    }
    public function addExercise(){
        require_once '../app/models/WorkoutExercise.php';
        $model = new WorkoutExercise();
        $model->create([
            'workout_id' => $_POST['workout_id'],
            'exercise_id' => $_POST['exercise_id'],
            'sets' => $_POST['sets'],
            'reps' => $_POST['reps'],
            'rest_time' => $_POST['rest_time'],
            'notes' => $_POST['notes']
        ]);
        header(
            'Location: ?controller=workout&action=manageExercises&id=' .
            $_POST['workout_id']
        );
        exit;
    }
    public function removeExercise(){
    require_once '../app/models/WorkoutExercise.php';
    $model = new WorkoutExercise();
    $model->delete($_GET['id']);
    header(
        'Location: ' . $_SERVER['HTTP_REFERER']
    );
    exit;
}
}