<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <!-- Header Superior -->
    <header class="main-header">
        <div class="header-container">
            <!-- Espacio reservado para tu archivo de logo como en la imagen -->
            <div class="logo">
                <a href="index.html">
                    <img src="imagen/logo.jpg" alt="Logo de ARDUNOVA">
                </a>
            </div>
            <nav class="main-nav">
                <ul>
                    <li><a href="index.html" class="active-link">Inicio</a></li>
                    <li><a href="tutoriales.html">Tutoriales</a></li>
                    <li><a href="proyectos.html">Proyectos</a></li>
                    <li><a href="recursos.html">Recursos</a></li>
                    <li><a href="comunidad.html">Comunidad</a></li>
                    <li><a href="nosotros.html">Nosotros</a></li>
                    <li><a href="login.php" class="btn-header-login">Iniciar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
    
        <section class="hero">
            <div class="hero-container">
                <div class="hero-content">
                    <h1>Aprendé <span class="highlight">Arduino</span> creá el futuro</h1>
                    <p>En ARDUNOVA te enseñamos de forma simple y práctica para que puedas crear tus propios proyectos.</p>
                    <div class="hero-buttons">
                        <a href="login.php" class="btn btn-gradient">Comenzar ahora</a>
                        <a href="proyectos.html" class="btn btn-outline-cyan">Ver proyectos</a>
                    </div>
                </div>
                <div class="hero-image">
                   
                    <img src="imagen/ardui2.png" alt="Placa Arduino Uno conectada a una placa de pruebas con LEDs">
                </div>
            </div>
        </section>

        
        <section class="section-container">
            <h2 class="section-title">Nuestros Proyectos</h2>
            <div class="grid-dinamico">
                <article class="card">
                    <div class="card-image">
                        <img src="imagen/semaforo.png" alt="Esquema lógico de interrupciones por hardware">
                    </div>
                    <div class="card-body">
                        <span class="tag-nivel principiante">Principiante</span>
                        <h3>Semáforo Inteligente</h3>
                        <p>Estructuración básica de temporizaciones de luces viales.</p>
                        <a href="proyectos.html" class="btn btn-gradient mt-1 w-100">Ver más</a>
                    </div>
                </article>
                <article class="card">
                    <div class="card-image">
                        <img src="imagen/robot-seguidor-linea.png" alt="Esquema lógico de interrupciones por hardware">
                    </div>
                    <div class="card-body">
                        <span class="tag-nivel intermedio">Intermedio</span>
                        <h3>Auto Seguidor de Línea</h3>
                        <p>Diseño de un robot móvil autónomo con sensores infrarrojos.</p>
                        <a href="proyectos.html" class="btn btn-gradient mt-1 w-100">Ver más</a>
                    </div>
                </article>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="footer-container">
            
            <div class="footer-column">
            <div class="footer-brand">
                    <h2>ARDUNOVA</h2>
                </div>
                <p class="footer-description">
                    Plataforma dedicada a la enseñanza interactiva, estructuración de proyectos de hardware libre y robótica.
                </p>
            </div>

            <div class="footer-column">
                <h3>Explorá</h3>
                <ul class="footer-links">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="tutoriales.html">Tutoriales</a></li>
                    <li><a href="proyectos.html">Proyectos</a></li>
                    <li><a href="recursos.html">Recursos</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Contacto</h3>
                <ul class="footer-links">
                    <li>Soporte: ardunova.oficial@gmail.com</li>
                    <li>Comunidad: consultas@ardunova.com</li>
                    <li>Buenos Aires, Argentina</li>
                </ul>
            </div>

            <div class="footer-column">
                <h3>Seguinos</h3>
                <ul class="footer-social">
                    <li><a href="https://youtube.com" target="_blank" rel="noopener">YouTube</a></li>
                    <li><a href="https://instagram.com" target="_blank" rel="noopener">Instagram</a></li>
                    <li><a href="https://github.com" target="_blank" rel="noopener">GitHub</a></li>
                </ul>
            </div>

        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 ARDUNOVA. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>