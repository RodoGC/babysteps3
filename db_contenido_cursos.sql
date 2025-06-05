-- Usar la base de datos
USE babysteps;

-- Crear tabla de módulos de curso
CREATE TABLE IF NOT EXISTS modulos_curso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    curso_id INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    orden INT NOT NULL,
    FOREIGN KEY (curso_id) REFERENCES cursos(id),
    UNIQUE KEY unique_orden (curso_id, orden)
);

-- Crear tabla de lecciones
CREATE TABLE IF NOT EXISTS lecciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modulo_id INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    contenido TEXT NOT NULL,
    tipo_contenido ENUM('texto', 'video', 'quiz') NOT NULL DEFAULT 'texto',
    url_video VARCHAR(255),
    orden INT NOT NULL,
    duracion_estimada INT NOT NULL COMMENT 'Duración estimada en minutos',
    FOREIGN KEY (modulo_id) REFERENCES modulos_curso(id),
    UNIQUE KEY unique_orden (modulo_id, orden)
);

-- Crear tabla de progreso de lecciones
CREATE TABLE IF NOT EXISTS progreso_lecciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    leccion_id INT NOT NULL,
    completada BOOLEAN DEFAULT FALSE,
    ultima_vista TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    tiempo_dedicado INT DEFAULT 0 COMMENT 'Tiempo dedicado en segundos',
    FOREIGN KEY (user_id) REFERENCES usuarios(id),
    FOREIGN KEY (leccion_id) REFERENCES lecciones(id),
    UNIQUE KEY unique_progreso (user_id, leccion_id)
);

-- Insertar datos de ejemplo para el curso de Primeros Auxilios
INSERT INTO modulos_curso (curso_id, titulo, orden) VALUES
(1, 'Introducción a los Primeros Auxilios', 1),
(1, 'RCP en Bebés', 2),
(1, 'Atragantamiento y Asfixia', 3),
(1, 'Quemaduras y Heridas', 4);

-- Insertar lecciones para el primer módulo
INSERT INTO lecciones (modulo_id, titulo, contenido, tipo_contenido, orden, duracion_estimada) VALUES
(1, '¿Qué son los primeros auxilios?', 
'Los primeros auxilios son la atención inmediata que se brinda a una persona que ha sufrido un accidente o enfermedad repentina. En el caso de los bebés, estos cuidados son especialmente delicados y requieren conocimientos específicos.

Objetivos del módulo:
- Comprender la importancia de los primeros auxilios
- Conocer el contenido del botiquín básico
- Aprender a mantener la calma en situaciones de emergencia
- Saber cuándo llamar a emergencias

Elementos esenciales en un botiquín para bebés:
1. Termómetro digital
2. Gasas estériles
3. Tijeras de punta roma
4. Solución antiséptica
5. Crema para quemaduras
6. Suero fisiológico
7. Tiritas infantiles', 
'texto', 1, 15),

(1, 'El botiquín de primeros auxilios', 
'<iframe width="560" height="315" src="https://www.youtube.com/embed/ejemplo" frameborder="0" allowfullscreen></iframe>', 
'video', 2, 10),

(1, 'Evaluación inicial', 
'{"preguntas": [
    {
        "pregunta": "¿Cuál es el primer paso al atender una emergencia con un bebé?",
        "opciones": [
            "Llamar inmediatamente a emergencias",
            "Evaluar el entorno y asegurar que sea seguro",
            "Comenzar RCP",
            "Llamar a los padres"
        ],
        "respuesta_correcta": 1
    }
]}', 
'quiz', 3, 5);

-- Insertar lecciones para el segundo módulo (RCP)
INSERT INTO lecciones (modulo_id, titulo, contenido, tipo_contenido, orden, duracion_estimada) VALUES
(2, 'Técnica de RCP en bebés', 
'La RCP en bebés es diferente a la de adultos. Los pasos principales son:

1. Verificar la respuesta del bebé
   - Tocar suavemente y hablar
   - Observar si hay movimiento

2. Verificar la respiración
   - Mirar el pecho
   - Escuchar la respiración
   - Sentir el aire

3. Técnica de compresiones:
   - Usar dos dedos para bebés menores de 1 año
   - Comprimir en el centro del pecho
   - Profundidad: 4 cm aproximadamente
   - Ritmo: 100-120 compresiones por minuto', 
'texto', 1, 20); 