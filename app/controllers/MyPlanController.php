<?php

require_once __DIR__.'/../../core/Controller.php';
require_once '../core/Auth.php';

require_once __DIR__.'/../models/MyPlan.php';

class MyPlanController extends Controller{

    public function __construct(){
        Auth::checkRole(['student']);
    }

    public function index(){

        $model = new MyPlan();

        $plan = $model->get(
            $_SESSION['user']['id']
        );

        $this->view(
            'my_plan/index',
            [
                'plan'=>$plan
            ]
        );
    }
}