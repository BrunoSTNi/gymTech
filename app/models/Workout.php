<?php 

require_once __DIR__ . '/../../core/Model.php';

class Workout extends Model {
    //Listar treinos
public function all(){
    $sql = "
        SELECT
            w.*,
            s.name AS student_name,
            u.name AS trainer_name,
            COUNT(we.id) AS total_exercises
        FROM workouts w

        LEFT JOIN students s
            ON s.id = w.student_id

        LEFT JOIN users u
            ON u.id = w.trainer_id

        LEFT JOIN workout_exercises we
            ON we.workout_id = w.id

        GROUP BY w.id

        ORDER BY s.name, w.workout_name
    ";

    $stmt = $this->db->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    //Cadastrar treinos
public function create($data){

    $stmt = $this->db->prepare(
        "INSERT INTO workouts
        (
            student_id,
            workout_name,
            objective,
            training_days,
            trainer_id
        )
        VALUES (?, ?, ?, ?, ?)"
    );

    return $stmt->execute([
        $data['student_id'],
        $data['workout_name'],
        $data['objective'],
        $data['training_days'],
        $data['trainer_id']
    ]);
}

    //Buscar Treino
public function find($id){
    $sql = "
        SELECT
            w.*,
            s.name AS student_name,
            u.name AS trainer_name
        FROM workouts w
        LEFT JOIN students s
            ON s.id = w.student_id
        LEFT JOIN users u
            ON u.id = w.trainer_id
        WHERE w.id = ?
    ";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    //Update
public function update($data){
    $sql = "
        UPDATE workouts
        SET
            student_id = ?,
            workout_name = ?,
            objective = ?,
            training_days = ?
        WHERE id = ?
    ";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([
        $data['student_id'],
        $data['workout_name'],
        $data['objective'],
        $data['training_days'],
        $data['id']
    ]);
}

public function createAndReturnId($data){

    $stmt = $this->db->prepare("
        INSERT INTO workouts(
            student_id,
            workout_name,
            objective,
            training_days,
            trainer_id
        )
        VALUES(?,?,?,?,?)
    ");

    $stmt->execute([
        $data['student_id'],
        $data['workout_name'],
        $data['objective'],
        $data['training_days'],
        $data['trainer_id']
    ]);

    return $this->db->lastInsertId();
}
    public function findByStudent($studentId)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM workouts
            WHERE student_id = ?"
        );

        $stmt->execute([$studentId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByStudent($studentId)
{
    $stmt = $this->db->prepare("
        DELETE we
        FROM workout_exercises we
        INNER JOIN workouts w
            ON we.workout_id = w.id
        WHERE w.student_id = ?
    ");

    $stmt->execute([$studentId]);

    $stmt = $this->db->prepare("
        DELETE FROM workouts
        WHERE student_id = ?
    ");

    $stmt->execute([$studentId]);
}

    //Delete
    public function delete($id){
        $sql = "DELETE FROM workouts WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}