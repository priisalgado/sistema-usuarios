<?php
require 'conexion.php';
$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form action="actualizar_usuario.php?id=<?php echo $usuario['id']; ?>" method="POST">
        <label for="nombre_completo">Nombre Completo:</label>
        <input type="text" name="nombre_completo" value="<?php echo $usuario['nombre_completo']; ?>" required><br>
        <label for="username">Usuario:</label>
        <input type="text" name="username" value="<?php echo $usuario['username']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
