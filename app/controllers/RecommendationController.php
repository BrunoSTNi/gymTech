<?php

require_once __DIR__.'/../../core/Controller.php';
require_once '../app/models/Exercise.php';
require_once '../core/Auth.php';
require_once '../app/models/Workout.php';
require_once '../app/models/WorkoutExercise.php';
require_once '../app/models/Student.php';

require_once __DIR__ . '/../services/WorkoutGeneratorService.php';
require_once __DIR__ . '/../services/WorkoutAI.php';

class RecommendationController extends Controller{
     public function __construct(){
        Auth::checkRole(['admin', 'trainer', 'student']);
    }
   public function index()
{
    $studentModel = new Students();
    $workoutModel = new Workout();

    $student = $studentModel->findByUserId(
        $_SESSION['user']['id']
    );

    $hasWorkout = false;

    if($student){
        $hasWorkout =
            count(
                $workoutModel->findByStudent(
                    $student['id']
                )
            ) > 0;
    }

    $this->view(
        'recommendations/index',
        [
            'hasWorkout' => $hasWorkout
        ]
    );
}
    public function generate(){    
        $objective = $_POST['objective'];
        $days = (int)$_POST['days'];
        $suggestions = [];
        if($objective == 'Hipertrofia'){
            switch($days){
                case 3:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas'
                    ];
                break;

                case 4:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas',
                        'D - Ombros'
                    ];
                break;

                case 5:
                    $suggestions = [
                        'A - Peito e Tríceps',
                        'B - Costas e Bíceps',
                        'C - Pernas',
                        'D - Ombros',
                        'E - Abdômen'
                    ];
                break;
            }
        }
        $this->view(
            'recommendations/result',[
                'suggestions'=>$suggestions
            ]
        );
    }

    public function generateForStudent()
{
    require_once __DIR__.'/../models/Student.php';

    $studentModel = new Students();

    $student = $studentModel->findByUserId(
        $_SESSION['user']['id']
    );

    if(!$student){
        die("Aluno não encontrado.");
    }

    $objective = $student['objective'];
    $days = $student['training_days'];

    $suggestions = [];

    if($objective == 'Hipertrofia'){

        switch($days){

            case 1:
                $suggestions = [
                    'A - Corpo Completo'
                ];
                break;

            case 2:
                $suggestions = [
                    'A - Superior',
                    'B - Inferior'
                ];
                break;

            case 3:
                $suggestions = [
                    'A - Peito e Tríceps',
                    'B - Costas e Bíceps',
                    'C - Pernas'
                ];
                break;

            case 4:
                $suggestions = [
                    'A - Peito e Tríceps',
                    'B - Costas e Bíceps',
                    'C - Pernas',
                    'D - Ombros e Abdômen'
                ];
                break;

            case 5:
                $suggestions = [
                    'A - Peito',
                    'B - Costas',
                    'C - Pernas',
                    'D - Ombros',
                    'E - Braços'
                ];
                break;

            case 6:
                $suggestions = [
                    'A - Peito',
                    'B - Costas',
                    'C - Pernas',
                    'D - Ombros',
                    'E - Bíceps',
                    'F - Tríceps'
                ];
                break;
        }
    }

    $this->view(
        'recommendations/result',
        [
            'suggestions' => $suggestions,
            'student' => $student
        ]
    );
}

public function generateAI()
{
    // Busca o aluno logado
    $studentModel = new Students();

    $student = $studentModel->findByUserId(
        $_SESSION['user']['id']
    );

    if (!$student) {
        die("Aluno não encontrado.");
    }

    // Verifica se já possui treino
    $workoutModel = new Workout();

    $existing = $workoutModel->findByStudent(
        $student['id']
    );

    if(count($existing) > 0){

        $workoutModel->deleteByStudent(
            $student['id']
        );

    }

    // Chama a IA
    require_once __DIR__ . '/../services/WorkoutGeneratorService.php';

    $generator = new WorkoutGeneratorService();

    $generator->generate($student);

    // Redireciona
    header('Location: ?controller=myWorkout&action=index');
    exit;
}
}