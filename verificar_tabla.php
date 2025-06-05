<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = ""; // Por defecto, XAMPP no tiene contraseña para el usuario root
$dbname = "babysteps";

echo "<h1>Verificación de la Base de Datos BabySteps</h1>";

try {
    // Crear conexión
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p>✅ Conexión a MySQL establecida correctamente.</p>";
    
    // Verificar si la base de datos existe
    $stmt = $conn->query("SHOW DATABASES LIKE '$dbname'");
    if ($stmt->rowCount() > 0) {
        echo "<p>✅ La base de datos '$dbname' existe.</p>";
        
        // Conectar a la base de datos
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Verificar si la tabla eventos_calendario existe
        $stmt = $conn->query("SHOW TABLES LIKE 'eventos_calendario'");
        if ($stmt->rowCount() > 0) {
            echo "<p>✅ La tabla 'eventos_calendario' existe.</p>";
            
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
        } else {
            echo "<p>❌ La tabla 'eventos_calendario' NO existe.</p>";
            echo "<p>👉 <a href='instalar_calendario.php' style='font-weight: bold; color: green;'>Haz clic aquí para crear la tabla</a></p>";
            echo "<p>O ejecuta manualmente el script SQL en phpMyAdmin:</p>";
            echo "<pre style='background-color: #f5f5f5; padding: 10px; border: 1px solid #ddd;'>";
            echo file_get_contents('sql/crear_tabla_calendario.sql');
            echo "</pre>";
        }
        
        // Mostrar todas las tablas de la base de datos
        $stmt = $conn->query("SHOW TABLES");
        echo "<h3>Tablas existentes en la base de datos '$dbname':</h3>";
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            echo "<li>" . $row[0] . "</li>";
        }
        echo "</ul>";
        
    } else {
        echo "<p>❌ La base de datos '$dbname' NO existe. Debes crearla primero.</p>";
    }
    
} catch(PDOException $e) {
    echo "<p>❌ Error de conexión: " . $e->getMessage() . "</p>";
}

echo "<p><a href='index.php'>Volver a la página principal</a></p>";
?> 