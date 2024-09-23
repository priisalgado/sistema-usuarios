<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

require 'conexion.php';

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
</head>
<body>
    <h2>Listado de Usuarios</h2>
    <a href="nuevo_usuario.html">Agregar Nuevo Usuario</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Username</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nombre_completo']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
                <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">Editar</a> | 
                <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
