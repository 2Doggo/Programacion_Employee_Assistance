<?php
// controllers/AdminController.php

require_once 'models/Employee.php';
require_once 'models/Attendance.php';

class AdminController {
    private $employeeModel;
    private $attendanceModel;

    public function __construct($pdo) {
        $this->employeeModel = new Employee($pdo);
        $this->attendanceModel = new Attendance($pdo);
    }

    public function viewEmployees() {
        $employees = $this->employeeModel->getAllEmployees();
        include 'views/admin/dashboard.php';
    }

    public function addEmployee() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $identification = $_POST['identification'];

            if ($this->employeeModel->createEmployee($name, $lastname, $identification)) {
                $message = "Empleado agregado con éxito";
                header('Location: index.php?action=admin_dashboard');
                exit;
            } else {
                $error = "Error al agregar el employee";
            }
        }

        include 'views/admin/add_employee.php';
    }

    public function editEmployee($id) {
        $employee = $this->employeeModel->getEmployeeById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $identification = $_POST['identification'];

            if ($this->employeeModel->updateEmployee($id, $name, $lastname, $identification)) {
                $message = "Empleado actualizado con éxito";
                header('Location: index.php?action=admin_dashboard');
                exit;
            } else {
                $error = "Error al actualizar el employee";
            }
        }

        include 'views/admin/edit_employee.php';
    }

    public function deleteEmployee($id) {
        if ($this->employeeModel->deleteEmployee($id)) {
            $message = "Empleado eliminado con éxito";
        } else {
            $error = "Error al eliminar el employee";
        }

        header('Location: index.php?action=admin_dashboard');
        exit;
    }

    public function generateReport() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $startDate = $_POST['start_date'];
            $endDate = $_POST['end_date'];

            $report = $this->attendanceModel->getAttendanceReport($startDate, $endDate);
        }

        include 'views/admin/generate_report.php';
    }
}
?>