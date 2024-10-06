<?php
// views/admin/view_employees.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Empleados - Sistema de Asistencia XYZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Lista de Empleados</h2>
    <?php if (isset($employees) && !empty($employees)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Identificación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo htmlspecialchars($employee->id); ?></td>
                    <td><?php echo htmlspecialchars($employee->name); ?></td>
                    <td><?php echo htmlspecialchars($employee->lastname); ?></td>
                    <td><?php echo htmlspecialchars($employee->identification); ?></td>
                    <td>
                        <a href="index.php?action=view_attendance&employee_id=<?php echo $employee->id; ?>" class="btn btn-info btn-sm">Ver Asistencia</a>
                        <a href="index.php?action=edit_employee&id=<?php echo $employee->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="index.php?action=delete_employee&id=<?php echo $employee->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de que desea eliminar este empleado?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="alert alert-info">No hay empleados registrados en el sistema.</p>
    <?php endif; ?>
    <a href="index.php?action=add_employee" class="btn btn-success">Agregar Empleado</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>