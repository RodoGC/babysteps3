-- Usar la base de datos
USE babysteps;

-- Crear la tabla de cursos
CREATE TABLE IF NOT EXISTS cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    duracion VARCHAR(50) NOT NULL,
    nivel VARCHAR(50) NOT NULL,
    instructor VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    consejos_ia TEXT NOT NULL
);

-- Insertar cursos de ejemplo
INSERT INTO cursos (titulo, descripcion, imagen, duracion, nivel, instructor, precio, consejos_ia) VALUES
('Primeros Auxilios para Bebés', 'Aprende técnicas esenciales de primeros auxilios específicas para bebés y niños pequeños. Este curso incluye RCP, manejo de atragantamientos, quemaduras y otras emergencias comunes.', '../img/curso-primeros-auxilios.jpg', '4 semanas', 'Principiante', 'Dra. Laura Martínez', 89.00, 'Practica las técnicas de RCP con un muñeco para ganar confianza. Mantén siempre a mano una lista de números de emergencia en tu hogar.'),
('Nutrición Infantil: De 0 a 2 años', 'Un curso completo sobre alimentación desde la lactancia hasta la introducción de alimentos sólidos. Aprenderás a preparar comidas nutritivas y a manejar alergias e intolerancias.', '../img/curso-nutricion.jpg', '6 semanas', 'Intermedio', 'Nutricionista Carlos Sánchez', 110.00, 'Introduce un alimento nuevo a la vez y espera 3-4 días antes del siguiente para identificar posibles alergias. Crea un diario de alimentación para seguir el progreso de tu bebé.'),
('Sueño Seguro del Bebé', 'Descubre técnicas y rutinas para mejorar el sueño de tu bebé de manera segura. Incluye estrategias para establecer patrones de sueño saludables y consejos para prevenir el síndrome de muerte súbita.', '../img/curso-sueno.jpg', '3 semanas', 'Principiante', 'Psicóloga Ana Gómez', 75.00, 'Establece una rutina consistente antes de dormir. La temperatura ideal para la habitación del bebé es entre 18-22°C. Utiliza ruido blanco para ayudar a tu bebé a conciliar el sueño.');

-- Crear tabla de progreso de cursos por usuario
CREATE TABLE IF NOT EXISTS progreso_cursos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    curso_id INT NOT NULL,
    progreso INT NOT NULL DEFAULT 0,
    fecha_inicio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id),
    FOREIGN KEY (curso_id) REFERENCES cursos(id),
    UNIQUE KEY user_curso (user_id, curso_id)
); 