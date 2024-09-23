<?php
session_start();
require 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password === $row['password']) {
            
            $_SESSION['user_id'] = $row['id'];
            echo "Inicio de sesión exitoso. Bienvenido, " . $username;
           
             header("Location: usuarios.php");
        } else {
          
            echo "Contraseña incorrecta.";
        }
    } else {
       
        echo "Usuario no encontrado.";
    }
}
?>
