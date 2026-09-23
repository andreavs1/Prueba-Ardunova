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
<div class="container"><div class="row align-items-center g-5">
<div class="col-12 col-lg-6 hero-content">
<h1>Aprendé <span class="highlight">Arduino</span> creá el futuro</h1>
<p>En ARDUNOVA te enseñamos de forma simple y práctica para que puedas crear tus propios proyectos.</p>
<div class="hero-buttons">
<a class="btn btn-gradient" href="login.php">Comenzar ahora</a>
<a class="btn btn-outline-cyan" href="proyectos.php">Ver proyectos</a>
</div>
</div>
<div class="col-12 col-lg-6 hero-image">
<img alt="Placa Arduino Uno conectada a una placa de pruebas con LEDs" src="assets/img/ardui2.png"/>
</div></div>
</section>
<section class="container section-container">
<h2 class="section-title">Nuestros Proyectos</h2>
<div class="row g-4">


<div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Esquema lógico de interrupciones por hardware" src="assets/img/semaforo.png"/>
</div>
<div class="card-body">
<span class="tag-nivel principiante">Principiante</span>
<h3>Semáforo Inteligente</h3>
<p>Estructuración básica de temporizaciones de luces viales.</p>
<a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Robot seguidor de línea" src="assets/img/robot-seguidor-linea.png"/>
</div>
<div class="card-body">
<span class="tag-nivel intermedio">Intermedio</span>
<h3>Auto Seguidor de Línea</h3>
<p>Diseño de un robot móvil autónomo con sensores infrarrojos.</p>
<a class="btn btn-gradient mt-1 w-100" href="proyectos.php">Ver más</a>
</div>
</article></div></div>
</section>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
