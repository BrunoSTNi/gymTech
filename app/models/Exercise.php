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
            "INSERT INTO exercises
            (name, muscle_group, video_url, description)
            VALUES(?, ?, ?, ?)"
        );
    }

    public function update($id, $data){
        $stmt = $this->db->prepare(
            "UPDATE exercises
             SET
                name=?,
                muscle_group=?,
                video_url=?,
                description=?
            WHERE id=?"
        );

        return $stmt->execute([
            $data['name'],
            $data['muscle_group'],
            $data['video_url'],
            $data['description'],
            $id
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM exercises WHERE id=?"
        );
        return $stmt->execute([$id]);
    }
}