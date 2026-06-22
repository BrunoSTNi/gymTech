<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../models/Plan.php';
require_once '../core/Auth.php';

class PlanController extends Controller{
    public function __construct(){
        Auth::checkRole(['admin']);
    }
        // Listar planos
    public function index() {
        $planModel = new Plan();
        $plans = $planModel->all();
        $this->view('plans/index', [
            'plans' => $plans
        ]);
    }

    // Tela de cadastro
    public function create() {
        $this->view('plans/create');
    }

    // Salvar plano
    public function store() {
        $planModel = new Plan();
        $planModel->create($_POST);
        header("Location: ?controller=plan&action=index");
        exit;
    }

    // Tela de edição
    public function edit() {
        $id = $_GET['id'];
        $planModel = new Plan();
        $plan = $planModel->find($id);
        $this->view('plans/edit', [
            'plan' => $plan
        ]);
    }

    // Atualizar plano
    public function update() {
        $planModel = new Plan();
        $planModel->update($_POST);
        header("Location: ?controller=plan&action=index");
        exit;
    }

    // Excluir plano
    public function delete() {
        $id = $_GET['id'];
        $planModel = new Plan();
        if($planModel->delete($id)){
            $_SESSION['error'] =
            "Não é possível excluir um plano que possui alunos cadastrados.";
        }
        else{
            $_SESSION['sucess'] =
            "Plano removido com sucesso.";
        }
        
        header("Location: ?controller=plan&action=index");
        exit;
    }
}
