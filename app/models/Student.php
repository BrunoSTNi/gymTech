<?php

require_once __DIR__ .'/../../core/Model.php';

class Students extends Model {
    public function all() {
        $sql = "SELECT students.*, plans.name AS plan_name
                FROM students
                LEFT JOIN plans
                ON students.plan_id = plans.id
                ORDER BY students.id DESC";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

public function create($data)
{
    $sql = "
        INSERT INTO students
        (
            name,
            email,
            age,
            objective,
            training_days,
            experience_level,
            limitations,
            plan_id,
            user_id
        )
        VALUES
        (
            ?,?,?,?,?,?,?,?,?
        )
    ";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([

        $data['name'],
        $data['email'],
        $data['age'],
        $data['objective'],

        $data['training_days'],
        $data['experience_level'],
        $data['limitations'],

        $data['plan_id'],
        $data['user_id']

    ]);
}

    public function find($id){
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $sql = "UPDATE students
                SET name = ?, email = ?, age = ?, objective = ?, plan_id = ?
                WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data["name"],
            $data["email"],
            $data["age"],
            $data["objective"],
            $data["plan_id"],
            $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function totalStudents(){
        $sql = "SELECT COUNT(*) as total FROM students";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function totalRevenue(){
        $sql = "SELECT SUM(plans.price) as revenue
                FROM students
                LEFT JOIN plans
                ON students.plan_id = plans.id";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);  
    }

    public function studentsByPlan(){
        $sql = "SELECT plans.name,
                     COUNT(students.id) as total
                FROM students
                LEFT JOIN plans
                ON students.plan_id = plans.id
                GROUP BY plans.name";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByUserId($userId){
        $stmt = $this->db->prepare(
            "SELECT *
            FROM students
            WHERE user_id = ?"
        );
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}