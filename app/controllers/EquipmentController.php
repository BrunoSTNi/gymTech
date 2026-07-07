<?php

require_once __DIR__.'/../../core/Controller.php';
require_once __DIR__.'/../models/Equipment.php';
require_once '../core/Auth.php';

class EquipmentController extends Controller{
    public function __construct(){
        Auth::checkRole(['admin']);
    }

    public function index(){
        $model = new Equipment();
        $equipments = $model->all();
        $this->view(
            'equipments/index',[
                'equipments' => $equipments
            ]
        );
    }

    public function create(){
        $this->view(
            'equipments/create'
        );
    }

    public function store(){
        $model = new Equipment();
        $model->create($_POST);
        header(
            "Location: ?controller=equipment&action=index"
        );
        exit;
    }

    public function edit(){
        $id = $_GET['id'];
        $model = new Equipment();
        $equipment = $model->find($id);
        $this->view(
            'equipments/edit',[
                'equipment' => $equipment
            ]
        );
    }

    public function update(){
        $model = new Equipment();
        $model->update($_POST);
        header(
            "Location: ?controller=equipment&action=index"
        );
        exit;
    }

    public function delete(){
        $id = $_GET['id'];
        $model= new Equipment();
        $model->delete($id);
        header(
            "Location: ?controller=equipment&action=index"
        );
        exit;
    }
}