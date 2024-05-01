<?php
// tests/IntegrationTest.php

use PHPUnit\Framework\TestCase;

class IntegrationTest extends TestCase
{
    public function testAddUser()
    {
        // Simular un envío de formulario con datos de usuario
        $_POST['name'] = "John Doe";
        $_POST['email'] = "john@example.com";

        // Incluir el archivo que contiene las funciones CRUD
        include 'crud.php';

        // Llamar a la función para agregar un usuario 
        addUser();

        // Verificar que el usuario se haya agregado correctamente 
        $user = getUserByEmail("john@example.com");
        $this->assertEquals("John Doe", $user['name']);
    }
}
?>

