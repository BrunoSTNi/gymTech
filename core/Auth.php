<?php

class Auth{
    public static function check(){
        if(!isset($_SESSION['user'])){
            header('Location: ?controller=auth&action=login');
            exit;
        }
    }

    public static function checkrole($roles){
        self::check();
        if(!in_array($_SESSION['user']['role'], $roles)){
            die('Acesso negado.');
        }
    }
}