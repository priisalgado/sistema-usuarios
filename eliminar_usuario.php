<?php
require 'conexion.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: usuarios.php");
} else {
    echo "Error al eliminar el usuario.";
}
?>
