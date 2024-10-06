<?php
session_start();
require_once 'config/database.php';
require_once 'controllers/EmployeeController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/AuthController.php';

$employeeController = new EmployeeController($pdo);
$adminController = new AdminController($pdo);
$authController = new AuthController($pdo);

$action = $_GET['action'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia XYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sistema de Asistencia XYZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=register_attendance">Registrar Asistencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=admin_dashboard">Panel de Administración</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=generate_report">Generar Informe</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=login">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?php
    switch ($action) {
        case 'home':
            echo "<h1>Bienvenido al Sistema de Asistencia XYZ</h1>";
            echo "<p>Por favor, seleccione una opción del menú para comenzar.</p>";
            break;
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
        case 'add_employee':
            $adminController->addEmployee();
            break;
        case 'edit_employee':
            $employeeId = $_GET['id'] ?? null;
            $adminController->editEmployee($employeeId);
            break;
        case 'delete_employee':
            $employeeId = $_GET['id'] ?? null;
            $adminController->deleteEmployee($employeeId);
            break;
        default:
            echo "<h1>Página no encontrada</h1>";
            echo "<p>Lo sentimos, la página que está buscando no existe.</p>";
            break;
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>