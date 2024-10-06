<?php

// Configuración de la base de datos
$host = 'localhost';
$dbname = 'asistencia_empleados';
$username = 'user_iacc';
$password = 'pR06rAm@C10n';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Nota: MySQL es una base de datos compatible con PHP y ampliamente utilizada.
// Otras opciones incluyen PostgreSQL, SQLite, y MariaDB.
?>
