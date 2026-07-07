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

        $sql = "INSERT INTO users(name, email, password, role, first_login)
                VALUES(?, ?, ?, ?, 1)";
         
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $name,
            $email,             
            $password, 
            $role            
            ]);
        return $this->db->lastInsertId();
    }

    public function updatePassword($id, $password){
        $stmt = $this->db->prepare(
            "UPDATE users
             SET password = ? 
             WHERE id = ?"
        );

        return $stmt->execute([
            $password,
            $id
        ]);
    }
    public function disableFirstLogin($id){
        $stmt = $this->db->prepare(
            "UPDATE users
            SET first_login = 0
            WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}