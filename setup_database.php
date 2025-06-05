<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, XAMPP no tiene contraseña para el usuario root

try {
    // Crear conexión
    $conn = new PDO("mysql:host=$servername", $username, $password);
    
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Conectado a MySQL correctamente.<br>";
    
    // Leer el archivo SQL
    $sql = file_get_contents('database_setup.sql');
    
    // Ejecutar el script SQL
    $conn->exec($sql);
    
    echo "Base de datos y tablas creadas correctamente.<br>";
    echo "Usuarios de prueba insertados.<br>";
    echo "<br>Ahora puedes iniciar sesión con:<br>";
    echo "- Usuario: admin, Contraseña: admin123<br>";
    echo "- Usuario: usuario, Contraseña: usuario123<br>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?> 