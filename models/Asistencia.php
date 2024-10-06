<?php
class Asistencia {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registerAttendance($employeeId, $type) {
        $stmt = $this->pdo->prepare("INSERT INTO asistencia (employee_id, type, datetime) VALUES (?, ?, NOW())");
        return $stmt->execute([$employeeId, $type]);
    }

    public function getAttendanceByEmployee($employeeId) {
        $stmt = $this->pdo->prepare("SELECT * FROM asistencia WHERE employee_id = ? ORDER BY datetime DESC");
        $stmt->execute([$employeeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAttendanceReport($startDate, $endDate) {
        $stmt = $this->pdo->prepare("
            SELECT e.name, e.lastname, e.identification, 
                   a.type, a.datetime
            FROM asistencia a
            JOIN empleados e ON a.employee_id = e.id
            WHERE a.datetime BETWEEN ? AND ?
            ORDER BY e.name, a.datetime
        ");
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
