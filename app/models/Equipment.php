<?php

require_once __DIR__. '/../../core/Model.php';

class Equipment extends Model{
    public function all(){
        $stmt = $this->db->query(
            "SELECT * FROM equipments ORDER BY name"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $sql = "
        INSERT INTO equipments(
            name,  
            category,                
            serial_number,                
            manufacturer,
            purchase_date,
            last_maintenance,
            next_maintenance,
            status)
        VALUES(
            ?,?,?,?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['name'],
            $data['category'],
            $data['serial_number'],
            $data['manufacturer'],
            $data['purchase_date'],
            $data['last_maintenance'],
            $data['next_maintenance'],
            $data['status']
        ]);   
    }

    public function find($id){
        $stmt = $this->db->prepare(
            "SELECT * FROM equipments WHERE id = ?"
        );

        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($data){
        $sql = "
            UPDATE equipments SET
                name = ?,
                category = ?,
                serial_number = ?,
                manufacturer = ?,
                purchase_date = ?,
                last_maintenance = ?,
                next_maintenance = ?,
                status = ?
            WHERE id = ?
        ";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['name'],
            $data['category'],
            $data['serial_number'],
            $data['manufacturer'],
            $data['purchase_date'],
            $data['last_maintenance'],
            $data['next_maintenance'],
            $data['status'],
            $data['id']
        ]);
    }

    public function delete($id){
        $stmt = $this->db->prepare(
            "DELETE FROM equipments WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

}