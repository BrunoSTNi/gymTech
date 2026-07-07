<?php

require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../../core/Controller.php';

class AuthController extends Controller {
  public function login(){
    require __DIR__ . '/../views/layouts/auth_header.php';
    require __DIR__ . '/../views/auth/login.php';
    require __DIR__ . '/../views/layouts/auth_footer.php';
}
   public function authenticate()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userModel = new User();

    $user = $userModel->findByEmail($email);

    if($user && password_verify($password, $user['password'])){

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role'],
            'first_login' => $user['first_login']
        ];

        if($user['first_login']){
            header('Location: ?controller=auth&action=changePassword');
            exit;
        }

        if($user['role'] == 'student'){
            header('Location: ?controller=studentDashboard&action=index');
        }else{
            header('Location: ?controller=dashboard&action=index');
        }

        exit;
    }

    // Login inválido
    $_SESSION['login_error'] = "E-mail ou senha incorretos.";

    header("Location: ?controller=auth&action=login");
    exit;
}

    public function logout() {
        session_destroy();

        header('Location: ?');
    }

    public function changePassword(){
        $this->view('auth/change_password');
    }
    

    public function updatePassword(){

        if($_POST['password'] != $_POST['confirm_password']){
            die("As senhas não coincidem.");
        }

        $userModel = new User();

        $userModel->updatePassword(
            $_SESSION['user']['id'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        );

        $userModel->disableFirstLogin(
            $_SESSION['user']['id']
        );

        $_SESSION['user']['first_login'] = 0;

        if($_SESSION['user']['role'] == 'student'){
            header(
                'Location: ?controller=myWorkout&action=index'
            );
        }
        else{
            header(
                'Location: ?controller=dashboard&action=index'
            );
        }

        exit;
    }
}