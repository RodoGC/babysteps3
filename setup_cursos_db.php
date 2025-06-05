<?php
// Incluir el archivo de configuración
require_once 'php/config.php';

try {
    // Leer el archivo SQL
    $sql = file_get_contents('db_cursos_setup.sql');
    
    // Ejecutar el script SQL
    $conn->exec($sql);
    
    echo "Tablas de cursos creadas correctamente.<br>";
    echo "Cursos de ejemplo insertados.<br>";
    echo "Tabla de progreso de cursos creada.<br>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?> 