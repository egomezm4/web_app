<?php
// Verificar si se ha pasado el ID del usuario a eliminar
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Redireccionar a index.php si no se proporciona un ID válido
    header("Location: index.php");
    exit();
}

// Incluir el archivo de funciones CRUD
include 'crud.php';

// Obtener el ID del usuario a eliminar
$id = $_GET['id'];

// Eliminar usuario de la base de datos
if (deleteUser($id)) {
    echo "<p>Usuario eliminado exitosamente.</p>";
} else {
    echo "<p>Error al eliminar usuario.</p>";
}
?>
