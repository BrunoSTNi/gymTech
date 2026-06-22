<?php

require_once __DIR__. '/../../core/Model.php';

class WorkoutExercise extends Model{
    public function allByWorkout($workoutId){
        $sql = "
                SELECT
                        we.*,
                        e.name as exercise_name,
                        e.muscle_group
                FROM workout_exercises we
                INNER JOIN exercises e
                ON e.id = we.exercise_id
                WHERE workout_id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$workoutId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stmt = $this->db->prepare("
            SELECT id
            FROM workout_exercises
            WHERE workout_id = ?
            AND exercise_id = ?
        ");

        $stmt->execute([
            $data['workout_id'],
            $data['exercise_id']
        ]);

        if($stmt->fetch()){
            return false;
        }
        $sql = "
                INSERT INTO workout_exercises
                (   
                    workout_id,
                    exercise_id,
                    sets,
                    reps,
                    rest_time,
                    notes
                )
                VALUES
                (
                    ?, ?, ?, ?, ?, ?
                )";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['workout_id'],
            $data['exercise_id'],
            $data['sets'],
            $data['reps'],
            $data['rest_time'],
            $data['notes'],
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM workout_exercises WHERE id=?"
        );
        return $stmt->execute([$id]);
    }
}
