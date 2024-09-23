
<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (username, password, nombre_completo, email) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $password, $nombre_completo, $email);

    if ($stmt->execute()) {
        header("Location: usuarios.php");
    } else {
        echo "Error al agregar el usuario.";
    }
}
?>
