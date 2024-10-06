<?php
// controllers/EmployeeController.php

require_once 'models/Employee.php';
require_once 'models/Attendance.php';

class EmployeeController {
    private $employeeModel;
    private $attendanceModel;

    public function __construct($pdo) {
        $this->employeeModel = new Employee($pdo);
        $this->attendanceModel = new Attendance($pdo);
    }

    public function registerAttendance() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employeeId = $_POST['employee_id'];
            $type = $_POST['type'];

            $employee = $this->employeeModel->getEmployeeById($employeeId);
            if (!$employee) {
                $error = "Empleado no encontrado";
            } else {
                $lastAttendance = $this->attendanceModel->getLastAttendanceByEmployee($employeeId);
                if ($lastAttendance && $lastAttendance->type === $type) {
                    $error = "No puedes registrar dos " . $type . "s consecutivas";
                } else {
                    if ($this->attendanceModel->registerAttendance($employeeId, $type)) {
                        $message = "Asistencia registrada con éxito";
                    } else {
                        $error = "Error al registrar la asistencia";
                    }
                }
            }
        }

        include 'views/employee/register_attendance.php';
    }

    public function viewAttendance($employeeId) {
        $employee = $this->employeeModel->getEmployeeById($employeeId);
        if (!$employee) {
            $error = "Empleado no encontrado";
        } else {
            $attendance = $this->attendanceModel->getAttendanceByEmployee($employeeId);
        }

        include 'views/employee/view_attendance.php';
    }
}
?>