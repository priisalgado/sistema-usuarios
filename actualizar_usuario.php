<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $username = $_POST['username'];
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE usuarios SET username = ?, nombre_completo = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $username, $nombre_completo, $email, $id);

    if ($stmt->execute()) {
        header("Location: usuarios.php");
    } else {
        echo "Error al actualizar el usuario.";
    }
}
?>
