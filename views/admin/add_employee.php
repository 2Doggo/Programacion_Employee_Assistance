<?php
// views/admin/add_employee.php
?>
    <h2>Agregar Nuevo Empleado</h2>
    <form action="index.php?action=add_employee" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="mb-3">
            <label for="identification" class="form-label">Identificación</label>
            <input type="text" class="form-control" id="identification" name="identification" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Empleado</button>
    </form><?php
