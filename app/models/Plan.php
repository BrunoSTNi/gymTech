<?php
require_once __DIR__ ."/../../core/Model.php";

class Plan extends Model {
    public function all(){
        $sql = "
            SELECT 
                plans.*,
                COUNT(students.id) AS total_students
            FROM plans

            LEFT JOIN students
            ON students.plan_id = plans.id

            GROUP BY plans.id";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasStudents($id){
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM students WHERE plan_id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetchColumn() > 0;
    }

    public function create($data){
        $sql = "INSERT INTO plans
        (name, price, duration, description)
        VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['name'],
            $data['price'],
            $data['duration'],
            $data['description']
        ]);
    }

    public function find($id){
        $stmt = $this->db->prepare(
            "SELECT * FROM plans WHERE id= ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data){
           $sql = "UPDATE plans 
                SET name = ?,
                    price = ?,
                    duration = ?,
                    description = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['name'],
            $data['price'],
            $data['duration'],
            $data['description'],
            $data['id']
        ]);
    }

    public function delete($id){
        if($this->hasStudents($id)){
            $_SESSION['error'] =
            "Não é possível excluir um plano que possui alunos vinculados.";
            return false;
        }
        $stmt = $this->db->prepare(
            "DELETE FROM plans WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }
}