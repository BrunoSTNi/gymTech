<?php

require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../../core/Controller.php';

class AuthController extends Controller {
    public function login() {
        $this->view('auth/login');
    }

    public function authenticate() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();

        $user = $userModel->findByEmail($email);

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id'=> $user['id'],
                'name'=> $user['name'],
                'role'=> $user['role']
            ];

            header('Location: ?controller=dashboard&action=index');
            exit;
        }   else {
            echo "Email ou senha inválidos";
        } 
    }

    public function logout() {
        session_destroy();

        header('Location: ?');
    }
}