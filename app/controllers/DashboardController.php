<?php

require_once __DIR__ .'/../../core/Controller.php';
require_once __DIR__ .'/../models/Student.php';
require_once '../core/Auth.php';

class DashboardController extends Controller {
    public function index() {
        Auth::checkRole(['admin', 'reception']);

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