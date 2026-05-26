<?php

require_once __DIR__ .'/../../core/Controller.php';
require_once __DIR__ .'/../models/Student.php';

class DashboardController extends Controller {
    public function index() {
        if(!isset($_SESSION['user'])) {
            header('Location: ?controller=auth&action=login');
            exit;
        }

        $studentModel = new Students();
        $totalStudents = $studentModel->totalStudents();
        $totalRevenue = $studentModel->totalRevenue();
        $studentsByPlan = $studentModel->studentsByPlan();
        $this->view('dashboard/index', [
            'totalStudents'=> $totalStudents,
            'totalRevenue' => $totalRevenue,
            'studentsByPlan' => $studentsByPlan
        ]);
    }
}