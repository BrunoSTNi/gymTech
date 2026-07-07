<?php

require_once __DIR__ . '/../../core/Model.php';

class Exercise extends Model{
    public function all(){
        $stmt = $this->db->query(
            "SELECT * FROM exercises ORDER BY muscle_group, name"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    public function find($id){
        $stmt = $this->db->prepare(
            "SELECT * FROM exercises WHERE id=?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stmt = $this->db->prepare(
            "INSERT INTO exercises(
            name,
            muscle_group,
            equipment,
            difficulty,
            objective,
            video_url,
            description
            )
            VALUES(?, ?, ?, ?, ?, ?, ?)"        
        );

        return $stmt->execute([
            $data['name'],
            $data['muscle_group'],
            $data['equipment'],
            $data['difficulty'],
            $data['objective'],
            $data['video_url'],
            $data['description'],
        ]);
    }

    public function update($id, $data){
        $stmt = $this->db->prepare(
            "UPDATE exercises
             SET
                name=?,
                muscle_group=?,
                equipment=?,
                difficulty=?,
                objective=?,
                video_url=?,
                description=?
            WHERE id=?"
        );

        return $stmt->execute([
            $data['name'],
            $data['muscle_group'],
            $data['equipment'],
            $data['difficulty'],
            $data['objective'],
            $data['video_url'],
            $data['description'],
            $id
        ]);
    }
    public function findByMuscleGroup(
            $group,
            $difficulty
            ){
             $stmt = $this->db->prepare("
                SELECT *
                FROM exercises
                WHERE muscle_group = ?
                AND (
                    difficulty = ?
                    OR difficulty = 'beginner'
                )
                ORDER BY RAND()
                LIMIT 4
            ");

        $stmt->execute([
            $group,
            $difficulty
        ]);

        return $stmt->fetchAll();
    }
   public function findRandomByMuscleGroup(
        $group,
        $difficulty,
        $limit
    )
    {
        $sql = "
            SELECT *
            FROM exercises
            WHERE muscle_group = ?
            AND (
                difficulty = ?
                OR difficulty = 'Iniciante'
            )
            ORDER BY RAND()
            LIMIT ?
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(1, $group);
        $stmt->bindValue(2, $difficulty);
        $stmt->bindValue(3, $limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM exercises WHERE id=?"
        );
        return $stmt->execute([$id]);
    }

    public function search($search, $group, $difficulty){
        $sql = "SELECT * FROM exercises WHERE 1=1";
        $params = [];
        if($search){
            $sql .= " AND name LIKE ?";
            $params[] = "%{$search}%";
        }

        if($group){
            $sql .= " AND muscle_group = ?";
            $params[] = $group;
        }

        if($difficulty){
            $sql .= " AND difficulty = ?";
            $params[] = $difficulty;
        }

        $sql .= " ORDER BY muscle_group,name";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
