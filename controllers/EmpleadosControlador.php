<?php

require_once 'models/Empleado.php';
require_once 'models/Asistencia.php';

class EmpleadosControlador {
    private $employeeModel;
    private $attendanceModel;

    public function __construct($pdo) {
        $this->employeeModel = new Empleado($pdo);
        $this->attendanceModel = new Asistencia($pdo);
    }

    public function registerAttendance() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $employeeId = $_POST['employee_id'];
            $type = $_POST['type']; // 'entrada' o 'salida'

            if ($this->attendanceModel->registerAttendance($employeeId, $type)) {
                echo "Asistencia registrada con éxito";
            } else {
                echo "Error al registrar la asistencia";
            }
        }
        // Aquí iría la lógica para mostrar el formulario de registro de asistencia
    }

    public function viewAttendance($employeeId) {
        $attendance = $this->attendanceModel->getAttendanceByEmployee($employeeId);
        // Aquí iría la lógica para mostrar la asistencia del empleado
    }
}
?>
