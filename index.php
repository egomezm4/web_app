<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Saludoxs SONNAR</title>
    <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        h2 {
            margin-bottom: 20px;
            color: #ffcc00;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            color: #fff;
        }

        table, th, td {
            border: 1px solid #555;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #555;
        }

        tr:nth-child(even) {
            background-color: #444;
        }

        a {
            text-decoration: none;
            color: #ffcc00;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .input-group {
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            background-color: #555;
            color: #fff;
            border: 1px solid #888;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #ffcc00;
            color: #333;
            cursor: pointer;
        }
    </style>

</head>
<body>
    <h2>HOLA MUNDOsssss</h2>

    <!-- Formulario para agregar un nuevo usuario -->
    <h3>Agregar Usuario</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Nombre: <input type="text" name="name" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" name="submit" value="Agregar Usuario">
    </form>

    <?php
    // Incluir el archivo de funciones CRUD
    include 'crud.php';

    // Procesar el formulario cuando se envíe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se ha enviado el formulario de agregar usuario
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Agregar usuario a la base de datos
            if (addUser($name, $email)) {
                echo "<p>Usuario agregado exitosamente.</p>";
            } else {
                echo "<p>Error al agregar usuario.</p>";
            }
        }
    }

    // Lista de usuarios
    echo "<h3>Lista de Usuarios</h3>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>";
    $users = getUsers();
    foreach ($users as $user) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['name'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>
                <a href='update.php?id=" . $user['id'] . "'>Editar</a>
                <a href='delete.php?id=" . $user['id'] . "'>Eliminar</a>
            </td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
