<?php
// views/employee/view_attendance.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Asistencia - Sistema de Asistencia XYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Registro de Asistencia</h2>
    <?php if (isset($employee)): ?>
        <h3>Empleado: <?php echo htmlspecialchars($employee->name . ' ' . $employee->lastname); ?></h3>
    <?php endif; ?>

    <?php if (isset($attendance) && !empty($attendance)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tipo</th>
                <th>Fecha y Hora</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($attendance as $record): ?>
                <tr>
                    <td><?php echo htmlspecialchars($record->type); ?></td>
                    <td><?php echo htmlspecialchars($record->datetime); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-info">No se encontraron registros de asistencia para este empleado.</p>
    <?php endif; ?>

    <a href="index.php?action=admin_dashboard" class="btn btn-primary">Volver al Panel de Administración</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
