<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, XAMPP no tiene contraseña para el usuario root
$dbname = "babysteps";

try {
    // Crear conexión
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Configurar el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL para crear la tabla de eventos del calendario (sin restricción de clave foránea)
    $sql = "
    CREATE TABLE IF NOT EXISTS `eventos_calendario` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` int(11) NOT NULL,
      `titulo` varchar(255) NOT NULL,
      `descripcion` text,
      `fecha_inicio` datetime NOT NULL,
      `fecha_fin` datetime NOT NULL,
      `color` varchar(7) DEFAULT '#3788d8',
      `todo_el_dia` tinyint(1) DEFAULT '0',
      `recordatorio` tinyint(1) DEFAULT '0',
      `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`),
      KEY `user_id` (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    
    // Ejecutar la consulta SQL
    $conn->exec($sql);
    
    echo "<h2>Instalación completada</h2>";
    echo "<p>La tabla de eventos del calendario se ha creado correctamente.</p>";
    echo "<p><a href='index.php'>Volver a la página principal</a></p>";
    
} catch(PDOException $e) {
    echo "<h2>Error en la instalación</h2>";
    echo "<p>Error al crear la tabla de eventos: " . $e->getMessage() . "</p>";
    echo "<p><a href='index.php'>Volver a la página principal</a></p>";
}
?> 