<?php
// views/admin/dashboard.php
?>
<h2>Panel de Administración</h2>
<a href="index.php?action=add_employee" class="btn btn-success mb-3">Agregar Nuevo Empleado</a>
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