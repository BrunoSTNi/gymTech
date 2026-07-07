<?php

require_once __DIR__.'/../../core/Model.php';

class MyProfile extends Model{

    public function get($userId){

        $stmt = $this->db->prepare(
            "SELECT *
            FROM students
            WHERE user_id=?"
        );

        $stmt->execute([$userId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}