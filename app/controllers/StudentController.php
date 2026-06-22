<?php

require_once __DIR__ .'/../models/Student.php';
require_once __DIR__ .'/../../core/Controller.php';
require_once '../core/Auth.php';

class StudentController extends Controller {
    public function __construct(){
        Auth::checkRole(['admin']);
    }
    public function index(){
        $studentsModel = new Students();
        $students = $studentsModel->all();
        $this->view('students/index', [
            'students' => $students
        ]);
    }
    public function create(){
        require_once __DIR__ .'/../models/Plan.php';
        $planModel = new Plan();
        $plans = $planModel->all();
        $this->view('students/create', [
            'plans'=> $plans
        ]);
    }

    public function store(){
        $studentModel = new Students();

        try{
            $studentModel->create($_POST);
            header('Location: ?controller=student&action=index');
            exit;
        }
        catch(PDOException $e){
            die("Email já cadastrado.");
        }
        
    }
    
    public function edit(){
        $id = $_GET['id'];
        $studentModel = new Students();
        $student = $studentModel->find($id);
        require_once __DIR__ .'/../models/Plan.php';
        $planModel = new Plan();
        $plans = $planModel->all();

        $this->view('students/edit', [
            'student' => $student,
            'plans' => $plans
        ]);
    }

    public function update(){
    $id = $_GET['id'];
    $studentModel = new Students();
    $studentModel->update($id, $_POST);
    header('Location: ?controller=student&action=index');
    exit;
    }

    public function delete(){
        $id = $_GET['id'];
        $studentModel = new Students();
        $studentModel->delete($id);
        header('Location: ?controller=student&action=index');
        exit;
    }
}