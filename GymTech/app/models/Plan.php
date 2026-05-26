<?php
require_once __DIR__ ."/../../core/Model.php";

class Plan extends Model {
    public function all() {
        $sql = "SELECT * FROM plans ORDER BY price ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}