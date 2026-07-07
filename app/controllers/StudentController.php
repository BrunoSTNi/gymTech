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

public function store()
{
    require_once __DIR__ . '/../models/User.php';

    $userModel = new User();
    $studentModel = new Students();

    try {

        $userId = $userModel->create(
            $_POST['name'],
            $_POST['email'],
            password_hash('123456', PASSWORD_DEFAULT),
            'student'
        );

        $studentModel->create([

            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'objective' => $_POST['objective'],

            'training_days' => $_POST['training_days'],
            'experience_level' => $_POST['experience_level'],
            'limitations' => $_POST['limitations'],

            'plan_id' => $_POST['plan_id'],

            // Usa o ID criado acima
            'user_id' => $userId

        ]);

        header('Location: ?controller=student&action=index');
        exit;

    } catch (PDOException $e) {

        die("Erro ao cadastrar aluno: " . $e->getMessage());

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