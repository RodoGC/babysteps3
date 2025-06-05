<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, XAMPP no tiene contraseña para el usuario root
$dbname = "babysteps";

echo "<h1>Creación directa de tabla eventos_calendario</h1>";

try {
    // Crear conexión
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Intentar eliminar la tabla si existe (para recrearla limpia)
    $conn->exec("DROP TABLE IF EXISTS eventos_calendario");
    echo "<p>✅ Tabla anterior eliminada (si existía).</p>";
    
    // SQL para crear la tabla de eventos del calendario (versión simplificada)
    $sql = "
    CREATE TABLE `eventos_calendario` (
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
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    
    // Ejecutar la consulta SQL
    $conn->exec($sql);
    
    echo "<p>✅ La tabla 'eventos_calendario' ha sido creada correctamente.</p>";
    
    // Verificar que la tabla se haya creado
    $stmt = $conn->query("SHOW TABLES LIKE 'eventos_calendario'");
    if ($stmt->rowCount() > 0) {
        echo "<p>✅ Verificación: La tabla 'eventos_calendario' existe en la base de datos.</p>";
        
        // Mostrar la estructura de la tabla
        $stmt = $conn->query("DESCRIBE eventos_calendario");
        echo "<h3>Estructura de la tabla 'eventos_calendario':</h3>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>Campo</th><th>Tipo</th><th>Nulo</th><th>Clave</th><th>Predeterminado</th><th>Extra</th></tr>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "<td>" . $row['Extra'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
    echo "<p>✅ Todo listo. Ahora puedes usar el calendario.</p>";
    echo "<p><a href='php/calendario.php' style='font-weight: bold; color: green;'>Ir al calendario</a></p>";
    
} catch(PDOException $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
}

echo "<p><a href='index.php'>Volver a la página principal</a></p>";
?> 