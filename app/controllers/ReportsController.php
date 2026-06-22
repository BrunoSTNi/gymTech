<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../core/Auth.php';

require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../models/Plan.php';
require_once __DIR__ . '/../models/Workout.php';

class ReportsController extends Controller
{
    public function index()
    {
        Auth::checkRole(['admin']);

        $studentModel = new Students();
        $planModel = new Plan();
        $workoutModel = new Workout();

        $totalStudents = $studentModel->totalStudents();
        $plans = $planModel->all();

        $this->view('reports/index', [
            'totalStudents' => $totalStudents,
            'plans' => $plans
        ]);
    }
}