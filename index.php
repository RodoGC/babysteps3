<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BabySteps - Centro de Aprendizaje para Padres Primerizos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Estilos específicos para la página de inicio */
        .hero {
            background: linear-gradient(rgba(91, 155, 213, 0.8), rgba(91, 155, 213, 0.6)), url('https://images.unsplash.com/photo-1492725764893-90b379c2b6e7?auto=format&fit=crop&w=1920');
            background-size: cover;
            background-position: center;
            padding: 120px 0;
            color: var(--white);
            text-align: center;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .hero .btn-primary {
            font-size: 1.1rem;
            padding: 12px 35px;
            transition: transform 0.3s ease;
        }

        .hero .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .hero {
                padding: 100px 0;
            }

            .hero-content h2 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>Bienvenidos a BabySteps</h2>
                <p>El centro especializado en la formación y apoyo para padres primerizos</p>
                <a href="php/cursos.php" class="btn btn-primary">Explorar Cursos</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">¿Por qué elegir BabySteps?</h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <i class="fas fa-book-reader"></i>
                    <h3>Cursos Especializados</h3>
                    <p>Ofrecemos cursos prácticos en temas esenciales como primeros auxilios, nutrición infantil y sueño seguro para bebés.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>Seguimiento de Progreso</h3>
                    <p>Nuestro sistema te permite seguir tu avance en cada curso, marcar lecciones como completadas y continuar donde lo dejaste.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Acceso en Cualquier Dispositivo</h3>
                    <p>Accede a tus cursos desde cualquier dispositivo con conexión a internet, sin necesidad de descargar aplicaciones adicionales.</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Contenido Confiable</h3>
                    <p>Todo nuestro contenido está basado en información actualizada y verificada sobre el cuidado infantil y desarrollo de bebés.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Lo que dicen nuestros padres</h2>
            <div class="testimonial-slider">
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>"BabySteps transformó completamente nuestra experiencia como padres primerizos. Los recursos y el apoyo que recibimos fueron invaluables."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?auto=format&fit=crop&w=150" alt="María García">
                        <div>
                            <h4>María García</h4>
                            <p>Madre de Samuel, 8 meses</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial">
                    <div class="testimonial-content">
                        <p>"Los cursos son prácticos y fáciles de seguir. Me sentí mucho más seguro cuidando a mi bebé después de completar el programa."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150" alt="Carlos Rodríguez">
                        <div>
                            <h4>Carlos Rodríguez</h4>
                            <p>Padre de Lucía, 1 año</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter">
        <div class="container">
            <div class="newsletter-content">
                <h2>Únete a nuestra comunidad</h2>
                <p>Recibe consejos semanales, recursos exclusivos y noticias sobre nuevos cursos.</p>
                <form action="php/subscribe.php" method="POST" class="newsletter-form">
                    <input type="email" name="email" placeholder="Tu correo electrónico" required>
                    <button type="submit" class="btn btn-primary">Suscribirse</button>
                </form>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="js/main.js"></script>
</body>
</html> 