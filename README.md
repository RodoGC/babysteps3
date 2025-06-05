# BabySteps - Plataforma para Padres Primerizos

BabySteps es una plataforma web diseñada para padres primerizos, que ofrece cursos, recursos y apoyo para hacer de la paternidad una experiencia increíble.

## Tecnologías utilizadas

- PHP 7.4+
- MySQL
- React 18
- Vite
- Tailwind CSS 3
- Axios

## Configuración del proyecto

### Requisitos previos

- XAMPP (con PHP 7.4+ y MySQL)
- Node.js y npm

### Pasos de instalación

1. Clona el repositorio en tu directorio htdocs de XAMPP:
   ```
   git clone <url-del-repositorio> BabySteps3
   cd BabySteps3
   ```

2. Configura la base de datos:
   - Abre tu navegador y accede a: http://localhost/BabySteps3/setup_database.php
   - Luego configura las tablas de cursos: http://localhost/BabySteps3/setup_cursos_db.php

3. Instala las dependencias de Node.js:
   ```
   npm install
   ```

4. Compila los archivos de React:
   ```
   npm run build
   ```

5. Accede a la aplicación:
   - Abre tu navegador y accede a: http://localhost/BabySteps3/

## Estructura del proyecto

- `/php`: Archivos PHP del backend
  - `/php/api`: Endpoints de la API para React
- `/src`: Código fuente de React
  - `/src/components`: Componentes de React
  - `/src/api`: Funciones para llamadas a la API
- `/dist`: Archivos compilados de React (generados con `npm run build`)
- `/css`: Estilos CSS generales
- `/img`: Imágenes del sitio

## Uso

1. Inicia sesión con uno de los usuarios de prueba:
   - Usuario: admin, Contraseña: admin123
   - Usuario: usuario, Contraseña: usuario123

2. O regístrate como nuevo usuario.

3. Explora los cursos disponibles, avanza en tu progreso y consulta los consejos de IA.

## Desarrollo

Para trabajar en el desarrollo del frontend:

```
npm run dev
```

Esto iniciará el servidor de desarrollo de Vite, que se actualizará automáticamente cuando hagas cambios en los archivos de React.

## Nota importante

Este proyecto es una demostración y no debe usarse en producción sin implementar medidas adicionales de seguridad, como:
- Hasheo de contraseñas
- Validación más robusta de entradas
- Protección contra ataques CSRF
- Configuración adecuada de CORS 