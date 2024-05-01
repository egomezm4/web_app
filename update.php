<?php
// Verificar si se ha pasado el ID del usuario a editar
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redireccionar a index.php si no se proporciona un ID válido
    header("Location: index.php");
    exit();
}

// Incluir el archivo de funciones CRUD
include 'crud.php';

// Obtener el ID del usuario a editar
$id = $_GET['id'];

// Obtener los datos del usuario desde la base de datos
$users = getUsers();

// Buscar el usuario con el ID dado
$user = null;
foreach ($users as $u) {
    if ($u['id'] == $id) {
        $user = $u;
        break;
    }
}

// Verificar si el usuario existe
if (!$user) {
    // Redireccionar a index.php si no se encuentra el usuario
    header("Location: index.php");
    exit();
}

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado el formulario de editar usuario
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Actualizar usuario en la base de datos
        if (updateUser($id, $name, $email)) {
            echo "<p>Usuario actualizado exitosamente.</p>";
        } else {
            echo "<p>Error al actualizar usuario.</p>";
        }
    }
}
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>" method="POST">
        Nombre: <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <input type="submit" name="submit" value="Guardar Cambios">
    </form>
</body>
</html>
