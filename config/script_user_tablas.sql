-- Crear el nuevo usuario
CREATE USER IF NOT EXISTS 'user_iacc'@'localhost' IDENTIFIED BY 'pR06rAm@C10n';

-- Otorgar todos los privilegios sobre la base de datos asistencia_empleados
GRANT ALL PRIVILEGES ON asistencia_empleados.* TO 'user_iacc'@'localhost';

-- Aplicar los cambios de privilegios
FLUSH PRIVILEGES;

-- Verificar la creación del usuario
SELECT User, Host FROM mysql.user;

-- Crear la base de datos
CREATE DATABASE asistencia_empleados;

-- Usar la bd
USE asistencia_empleados;

-- Crear tabla empleados y asistencia
CREATE TABLE empleados (
                           id INT AUTO_INCREMENT PRIMARY KEY,
                           name VARCHAR(50) NOT NULL,
                           lastname VARCHAR(50) NOT NULL,
                           identification VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE asistencia (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            employee_id INT NOT NULL,
                            type ENUM('entrada', 'salida') NOT NULL,
                            datetime DATETIME NOT NULL,
                            FOREIGN KEY (employee_id) REFERENCES empleados(id)
);

-- Verificar que se han creado las tablas
SHOW TABLES;

-- Verificar estructura de las tablas
DESCRIBE employees;
DESCRIBE attendance;