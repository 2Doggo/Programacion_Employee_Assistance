<?php
// views/employee/register_attendance.php
?>
<h2>Registrar Asistencia</h2>
<form action="index.php?action=register_attendance" method="post">
    <div class="mb-3">
        <label for="employee_id" class="form-label">ID de Empleado</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de Registro</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="entrada" value="entrada" checked>
            <label class="form-check-label" for="entrada">Entrada</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="salida" value="salida">
            <label class="form-check-label" for="salida">Salida</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Asistencia</button>
</form>