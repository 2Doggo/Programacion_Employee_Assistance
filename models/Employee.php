<?php
// models/Employee.php

class Employee {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllEmployees() {
        $stmt = $this->pdo->query("SELECT * FROM employees");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getEmployeeById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function createEmployee($name, $lastname, $identification) {
        $stmt = $this->pdo->prepare("INSERT INTO employees (name, lastname, identification) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $lastname, $identification]);
    }

    public function updateEmployee($id, $name, $lastname, $identification) {
        $stmt = $this->pdo->prepare("UPDATE employees SET name = ?, lastname = ?, identification = ? WHERE id = ?");
        return $stmt->execute([$name, $lastname, $identification, $id]);
    }

    public function deleteEmployee($id) {
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getEmployeeByIdentification($identification) {
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE identification = ?");
        $stmt->execute([$identification]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>