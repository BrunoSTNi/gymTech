<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/StudentDashboard.php';
require_once '../core/Auth.php';

class StudentDashboardController extends Controller {

    public function __construct(){
        Auth::checkRole(['student']);
    }

    public function index(){

        require_once __DIR__ . '/../models/MyWorkout.php';
        require_once __DIR__ . '/../models/Student.php';

        $studentModel = new Students();
        $student = $studentModel->findByUserId(
            $_SESSION['user']['id']
        );

        $workoutModel = new MyWorkout();

        $totalWorkouts = count(
            $workoutModel->getByStudent(
                $student['id']
            )
        );
         $model = new StudentDashboard();

        $dashboard = $model->getData(
            $_SESSION['user']['id']
        );

        $this->view(
            'student_dashboard/index',
            [
                'dashboard' => $dashboard,
                'student' => $student,
                'totalWorkouts' => $totalWorkouts
            ]
        );
    }
}