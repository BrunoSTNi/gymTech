<?php

require_once __DIR__ . '/../../core/Model.php';

class MyWorkout extends Model{
    public function getWorkouts($userId){
        $sql = 
        " SELECT
                w.*,
                e.name AS exercise_name,
                e.video_url,
                e.description,
                we.sets,
                we.reps,
                we.rest_time,
                we.notes
            FROM students s
            INNER JOIN workouts w
                ON w.student_id = s.id
            INNER JOIN workout_exercises we
                ON we.workout_id = w.id
            INNER JOIN exercises e
                ON e.id = we.exercise_id
            WHERE s.user_id = ?
            ORDER BY w.workout_name";
            
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   public function getByStudent($studentId){
        $sql = "
            SELECT *
            FROM workouts
            WHERE student_id = ?
            ORDER BY workout_name
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function all($userId){

        $sql = "
            SELECT
                w.*
            FROM workouts w

            INNER JOIN students s
                ON s.id = w.student_id

            WHERE s.user_id = ?
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($workoutId)
{
    // Busca os dados do treino
    $stmt = $this->db->prepare("
        SELECT *
        FROM workouts
        WHERE id = ?
    ");

    $stmt->execute([$workoutId]);

    $workout = $stmt->fetch(PDO::FETCH_ASSOC);

    // Busca os exercícios do treino
    $stmt = $this->db->prepare("
        SELECT

            we.*,

            e.name,
            e.description,
            e.difficulty,
            e.video_url,
            e.muscle_group,
            e.equipment

        FROM workout_exercises we

        INNER JOIN exercises e
            ON e.id = we.exercise_id

        WHERE we.workout_id = ?

        ORDER BY we.id ASC
    ");

    $stmt->execute([$workoutId]);

    $exercises = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return [

        'workout' => $workout,
        'exercises' => $exercises

    ];
}
}