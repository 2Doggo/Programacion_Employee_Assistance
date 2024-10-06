<?php
// views/admin/generate_report.php
?>
    <h2>Generar Informe de Asistencia</h2>
    <form action="index.php?action=generate_report" method="post">
        <div class="mb-3">
            <label for="start_date" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Generar Informe</button>
    </form>

<?php if (isset($report)): ?>
    <h3 class="mt-4">Informe de Asistencia</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Identificación</th>
            <th>Tipo</th>
            <th>Fecha y Hora</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($report as $record): ?>
            <tr>
                <td><?php echo htmlspecialchars($record->name); ?></td>
                <td><?php echo htmlspecialchars($record->lastname); ?></td>
                <td><?php echo htmlspecialchars($record->identification); ?></td>
                <td><?php echo htmlspecialchars($record->type); ?></td>
                <td><?php echo htmlspecialchars($record->datetime); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>