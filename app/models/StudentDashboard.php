<?php

require_once __DIR__.'/../../core/Model.php';

class StudentDashboard extends Model{

    public function getData($userId){

        $sql = "
            SELECT
                s.name,
                s.objective,
                p.name AS plan_name,
                COUNT(w.id) AS total_workouts
            FROM students s

            LEFT JOIN plans p
                ON p.id = s.plan_id

            LEFT JOIN workouts w
                ON w.student_id = s.id

            WHERE s.user_id = ?

            GROUP BY s.id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}