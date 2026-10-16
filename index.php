<?php
session_start();
$active_page = 'inicio';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ARDUNOVA - Aprendizaje práctico de Arduino, electrónica y robótica.">
  <title>ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>

<main>
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-12 col-lg-6 hero-content">
        <span class="hero-badge">Aprendé • Creá • Experimentá</span>
        <h1>Aprendé <span class="highlight">Arduino</span> creá el futuro</h1>
        <p>En ARDUNOVA te enseñamos de forma simple y práctica para que puedas crear tus propios proyectos.</p>
        <div class="hero-buttons">
          <a class="btn btn-gradient btn-lg" href="login.php">Comenzar ahora</a>
          <a class="btn btn-outline-cyan btn-lg" href="proyectos.php">Ver proyectos</a>
        </div>
      </div>

      <div class="col-12 col-lg-6 hero-image">
        <div id="heroCarousel" class="carousel slide carousel-fade hero-carousel" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Arduino"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Robótica"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Proyectos"></button>
          </div>

          <div class="carousel-inner rounded-4 overflow-hidden shadow-lg">
            <div class="carousel-item active">
              <img src="assets/img/ardui2.png" class="d-block w-100" alt="Placa Arduino Uno">
              <div class="carousel-caption d-none d-md-block">
                <span>Arduino desde cero</span>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/img/robot.png" class="d-block w-100" alt="Proyecto de robótica">
              <div class="carousel-caption d-none d-md-block">
                <span>Robótica y creatividad</span>
              </div>
            </div>
            <div class="carousel-item">
              <img src="assets/img/proyecto.png" class="d-block w-100" alt="Proyecto práctico">
              <div class="carousel-caption d-none d-md-block">
                <span>Proyectos para aprender haciendo</span>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Anterior">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Siguiente">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="container section-container">
  <div class="section-heading">
    <div>
      <span class="section-kicker">Aprendé haciendo</span>
      <h2 class="section-title mb-1">Nuestros Proyectos</h2>
      <p class="section-subtitle mb-0">Ideas simples para empezar y proyectos para seguir avanzando.</p>
    </div>
  </div>

  <div id="projectsCarousel" class="carousel slide project-carousel" data-bs-ride="false">
    <div class="carousel-inner">

      <div class="carousel-item active">
        <div class="row g-4">
          <div class="col-12 col-md-6">
            <article class="card h-100">
              <div class="card-image">
                <img alt="Semáforo inteligente" src="assets/img/semaforo.png"/>
              </div>
              <div class="card-body">
                <span class="tag-nivel principiante">Principiante</span>
                <h3>Semáforo Inteligente</h3>
                <p>Estructuración básica de temporizaciones de luces viales.</p>
                <a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
              </div>
            </article>
          </div>

          <div class="col-12 col-md-6">
            <article class="card h-100">
              <div class="card-image">
                <img alt="Robot seguidor de línea" src="assets/img/robot-seguidor-linea.png"/>
              </div>
              <div class="card-body">
                <span class="tag-nivel intermedio">Intermedio</span>
                <h3>Auto Seguidor de Línea</h3>
                <p>Diseño de un robot móvil autónomo con sensores infrarrojos.</p>
                <a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
              </div>
            </article>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row g-4">
          <div class="col-12 col-md-6">
            <article class="card h-100">
              <div class="card-image">
                <img alt="Pantalla LCD" src="assets/img/lcd.jpg"/>
              </div>
              <div class="card-body">
                <span class="tag-nivel principiante">Principiante</span>
                <h3>Pantalla LCD</h3>
                <p>Conocé cómo mostrar información en una pantalla usando Arduino.</p>
                <a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
              </div>
            </article>
          </div>

          <div class="col-12 col-md-6">
            <article class="card h-100">
              <div class="card-image">
                <img alt="Sensor ultrasónico" src="assets/img/ultrasonico.jpg"/>
              </div>
              <div class="card-body">
                <span class="tag-nivel intermedio">Intermedio</span>
                <h3>Sensor Ultrasónico</h3>
                <p>Aprendé a medir distancias y usar sensores en tus proyectos.</p>
                <a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
              </div>
            </article>
          </div>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev project-control" type="button" data-bs-target="#projectsCarousel" data-bs-slide="prev" aria-label="Proyectos anteriores">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next project-control" type="button" data-bs-target="#projectsCarousel" data-bs-slide="next" aria-label="Proyectos siguientes">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>
</main>

<?php include 'includes/chatbot.php'; ?>
<?php include 'includes/footer.php'; ?>
</body>
</html>
