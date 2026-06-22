<?php 

require_once __DIR__ . '/../../core/Model.php';

class Workout extends Model {
    //Listar treinos
    public function all(){
        $sql = "SELECT workouts.*,
                       students.name AS student_name
                FROM workouts
                LEFT JOIN students
                ON workouts.student_id = students.id
                ORDER BY workouts.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Cadastrar treinos
    public function create($data){
        $sql = "INSERT INTO workouts
                (student_id, workout_name, objective, training_days)
                VALUES (?, ? ,?, ?)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['student_id'],
            $data['workout_name'],
            $data['objective'],
            $data['training_days']
        ]);
    }

    //Buscar Treino
    public function find($id){
        $sql = "SELECT
                    workouts.*,
                    students.name AS student_name
                FROM workouts 
                LEFT JOIN students
                ON students.id = workouts.student_id
                WHERE workouts.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Update
    public function update($id, $data){
        $sql = "UPDATE workouts
                SET student_id = ?,
                    workout_name = ?,
                    objective = ?,
                    training_days = ?
                WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['student_id'],
            $data['workout_name'],
            $data['objective'],
            $data['training_days'],
            $id
        ]);
    }

    //Delete
    public function delete($id){
        $sql = "DELETE FROM workouts WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}