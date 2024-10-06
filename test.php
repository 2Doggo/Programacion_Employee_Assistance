<?php
require_once 'config/database.php';

echo "<h1>Prueba de conexión a la base de datos</h1>";

try {
    $stmt = $pdo->query("SELECT * FROM empleados LIMIT 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "<p>Conexión exitosa. Se encontró al menos un employee en la base de datos.</p>";
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    } else {
        echo "<p>Conexión exitosa, pero no se encontraron empleados en la base de datos.</p>";
    }
} catch (PDOException $e) {
    echo "<p>Error al consultar la base de datos: " . $e->getMessage() . "</p>";
}
?>