<?php

require_once __DIR__ .'/../../core/Model.php';

class User extends Model {
    public function findByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute(([$email]));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name , $email, $password, $role = 'student') {

        $sql = "INSERT INTO users(name, email, password, role)
                VALUES(?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $name,
            $email,             
            $password, 
            $role
            ]);
    }
}