<?php
// models/Attendance.php

class Attendance {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registerAttendance($employeeId, $type) {
        $stmt = $this->pdo->prepare("INSERT INTO attendance (employee_id, type, datetime) VALUES (?, ?, NOW())");
        return $stmt->execute([$employeeId, $type]);
    }

    public function getAttendanceByEmployee($employeeId) {
        $stmt = $this->pdo->prepare("SELECT * FROM attendance WHERE employee_id = ? ORDER BY datetime DESC");
        $stmt->execute([$employeeId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAttendanceReport($startDate, $endDate) {
        $stmt = $this->pdo->prepare("
            SELECT e.name, e.lastname, e.identification, a.type, a.datetime
            FROM attendance a
            JOIN employees e ON a.employee_id = e.id
            WHERE a.datetime BETWEEN ? AND ?
            ORDER BY e.name, a.datetime
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLastAttendanceByEmployee($employeeId) {
        $stmt = $this->pdo->prepare("
            SELECT * FROM attendance 
            WHERE employee_id = ? 
            ORDER BY datetime DESC 
            LIMIT 1
        ");
        $stmt->execute([$employeeId]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>
