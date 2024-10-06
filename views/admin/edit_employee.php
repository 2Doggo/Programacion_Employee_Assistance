<?php
// views/admin/edit_employee.php
?>
    <h2>Editar Empleado</h2>
<form action="index.php?action=edit_employee&id=<?php echo $employee->id; ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($employee->name); ?>" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($employee->lastname); ?>" required>
    </div>
    <div class="mb-3">
        <label for="identification" class="form-label">Identificación</label>
        <input type="text" class="form-control" id="identification" name="identification" value="<?php echo htmlspecialchars($employee->identification); ?>" required>
    </div>
    <button type="submit" class="btn btn-warning">Actualizar Empleado</button>
    </form><?php
