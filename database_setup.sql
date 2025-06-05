-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS babysteps;

-- Usar la base de datos
USE babysteps;

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insertar usuarios de prueba
-- Nota: En una aplicación real, las contraseñas deben estar hasheadas
INSERT INTO usuarios (username, password, nombre, email) VALUES
('admin', 'admin123', 'Administrador', 'admin@babysteps.com'),
('usuario', 'usuario123', 'Usuario Demo', 'usuario@babysteps.com'); 