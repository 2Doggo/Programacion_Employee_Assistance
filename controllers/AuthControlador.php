<?php
class AuthControlador {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Aquí iría la lógica de autenticación
            // Por simplicidad, usamos una autenticación básica
            if ($username === 'admin' && $password === 'password') {
                $_SESSION['user'] = 'admin';
                header('Location: index.php?action=admin_dashboard');
            } else {
                echo "Credenciales inválidas";
            }
        }
        // Aquí iría la lógica para mostrar el formulario de login
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}
?>