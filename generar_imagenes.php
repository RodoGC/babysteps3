<?php
// Este script genera imágenes para los recursos usando la biblioteca GD de PHP

// Verificar si GD está disponible
if (!extension_loaded('gd')) {
    die('La extensión GD no está disponible. Por favor, instálala para generar las imágenes.');
}

// Crear directorio para las imágenes si no existe
$dir = 'img/recursos';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Definir los recursos
$recursos = [
    [
        'nombre' => 'alimentacion',
        'titulo' => 'Alimentación Bebés',
        'color' => [91, 155, 213] // RGB para #5B9BD5
    ],
    [
        'nombre' => 'vacunacion',
        'titulo' => 'Calendario Vacunación',
        'color' => [255, 167, 38] // RGB para #FFA726
    ],
    [
        'nombre' => 'hospital',
        'titulo' => 'Checklist Hospital',
        'color' => [76, 175, 80] // RGB para #4CAF50
    ],
    [
        'nombre' => 'desarrollo',
        'titulo' => 'Desarrollo Infantil',
        'color' => [156, 39, 176] // RGB para #9C27B0
    ],
    [
        'nombre' => 'canciones',
        'titulo' => 'Canciones de Cuna',
        'color' => [255, 87, 34] // RGB para #FF5722
    ],
    [
        'nombre' => 'ejercicios',
        'titulo' => 'Ejercicios Posparto',
        'color' => [33, 150, 243] // RGB para #2196F3
    ]
];

// Generar imagen para la sección hero
generarImagen('recursos-hero', 'Recursos para Padres', [91, 155, 213], 1200, 400, "$dir/recursos-hero.jpg");

// Generar imágenes para cada recurso
foreach ($recursos as $recurso) {
    generarImagen(
        $recurso['nombre'],
        $recurso['titulo'],
        $recurso['color'],
        400,
        250,
        "$dir/{$recurso['nombre']}.jpg"
    );
    echo "Imagen generada: $dir/{$recurso['nombre']}.jpg<br>";
}

echo "<p>Todas las imágenes han sido generadas correctamente.</p>";
echo "<p><a href='index.php'>Volver a la página principal</a></p>";

/**
 * Genera una imagen con texto centrado
 *
 * @param string $nombre Nombre de la imagen (para el archivo)
 * @param string $texto Texto a mostrar en la imagen
 * @param array $colorFondo Color de fondo en formato RGB
 * @param int $ancho Ancho de la imagen
 * @param int $alto Alto de la imagen
 * @param string $ruta Ruta donde guardar la imagen
 */
function generarImagen($nombre, $texto, $colorFondo, $ancho, $alto, $ruta) {
    // Crear la imagen
    $imagen = imagecreatetruecolor($ancho, $alto);
    
    // Definir colores
    $colorFondoImg = imagecolorallocate($imagen, $colorFondo[0], $colorFondo[1], $colorFondo[2]);
    $colorTexto = imagecolorallocate($imagen, 255, 255, 255);
    
    // Rellenar el fondo
    imagefill($imagen, 0, 0, $colorFondoImg);
    
    // Añadir texto
    $fuente = 5; // Fuente grande (5 es el máximo para imagestring)
    
    // Calcular posición del texto para centrarlo de manera aproximada
    // La longitud aproximada de cada carácter con la fuente 5 es de 8 píxeles
    $longitudTexto = strlen($texto) * 8;
    $x = ($ancho - $longitudTexto) / 2;
    $y = ($alto - 16) / 2; // 16 es aproximadamente la altura de la fuente 5
    
    // Asegurar que las coordenadas no sean negativas
    $x = max(0, $x);
    $y = max(0, $y);
    
    // Escribir el texto
    imagestring($imagen, $fuente, $x, $y, $texto, $colorTexto);
    
    // Guardar la imagen
    imagejpeg($imagen, $ruta, 90);
    
    // Liberar memoria
    imagedestroy($imagen);
}
?> 