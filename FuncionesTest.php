<?php
// tests/FuncionesTest.php

use PHPUnit\Framework\TestCase;

class FuncionesTest extends TestCase
{
    public function testAddUser()
    {
        include 'crud.php';

        // Arrange
        $name = "John Doe";
        $email = "john@example.com";

        // Act
        $sql = addUser($name, $email);

        // Assert
        $this->assertTrue($sql, "La función addUser() no devolvió true después de agregar un usuario");
        
    }
}
?>
