<?php

session_start();

require_once 'config/database.php';
require_once 'controllers/EmpleadosControlador.php';
require_once 'controllers/AdminControlador.php';
require_once 'controllers/AuthControlador.php';

$employeeController = new EmpleadosControlador($pdo);
$adminController = new AdminControlador($pdo);
$authController = new AuthControlador($pdo);

$action = $_GET['action'] ?? 'login';

if (!isset($_SESSION['user']) && $action !== 'login') {
    header('Location: index.php?action=login');
    exit;
}

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'register_attendance':
        $employeeController->registerAttendance();
        break;
    case 'view_attendance':
        $employeeId = $_GET['employee_id'] ?? null;
        $employeeController->viewAttendance($employeeId);
        break;
    case 'admin_dashboard':
        $adminController->viewEmployees();
        break;
    case 'generate_report':
        $adminController->generateReport();
        break;
    default:
        echo "Página no encontrada";
        break;
}
?>
