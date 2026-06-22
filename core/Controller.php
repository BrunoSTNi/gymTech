<?php

class Controller {

    protected function view($view, $data = []) {

        extract($data);

        require __DIR__ . '/../app/views/layouts/header.php';

        if(isset($_SESSION['user'])){
            require __DIR__ . '/../app/views/layouts/sidebar.php';
        }

        require __DIR__ . '/../app/views/' . $view . '.php';

        require __DIR__ . '/../app/views/layouts/footer.php';
    }
}