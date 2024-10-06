<?php
// models/Employee.php

class Empleado {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEmployees() {
        $stmt = $this->pdo->query("SELECT * FROM empleados");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeeById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM empleados WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployee($name, $lastname, $identification) {
        $stmt = $this->pdo->prepare("INSERT INTO empleados (name, lastname, identification) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $lastname, $identification]);
    }

    public function updateEmployee($id, $name, $lastname, $identification) {
        $stmt = $this->pdo->prepare("UPDATE empleados SET name = ?, lastname = ?, identification = ? WHERE id = ?");
        return $stmt->execute([$name, $lastname, $identification, $id]);
    }

    public function deleteEmployee($id) {
        $stmt = $this->pdo->prepare("DELETE FROM empleados WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
