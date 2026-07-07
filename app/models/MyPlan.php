<?php

require_once __DIR__.'/../../core/Model.php';

class MyPlan extends Model{

    public function get($userId){

        $sql = "
            SELECT
                p.*
            FROM plans p

            INNER JOIN students s
                ON s.plan_id = p.id

            WHERE s.user_id = ?
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}