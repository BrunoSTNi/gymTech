<?php

require_once __DIR__.'/../../core/Controller.php';
require_once '../core/Auth.php';

require_once __DIR__.'/../models/MyProfile.php';

class MyProfileController extends Controller{

    public function __construct(){
        Auth::checkRole(['student']);
    }

    public function index(){

        $model = new MyProfile();

        $profile = $model->get(
            $_SESSION['user']['id']
        );

        $this->view(
            'my_profile/index',
            [
                'profile'=>$profile
            ]
        );
    }
}