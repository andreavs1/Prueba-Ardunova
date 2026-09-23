<?php
session_start();
$active_page = 'comunidad';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ARDUNOVA - Aprendizaje práctico de Arduino, electrónica y robótica.">
  <title>Comunidad - ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="container section-container">
<h1 class="section-title">Comunidad Educativa</h1>
<div class="row g-4">



<div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-body">
<h3>Preguntas Frecuentes</h3>
<p>Consultá las dudas arquitectónicas y de software más comunes resueltas por los docentes del aula.</p>
<a class="btn btn-outline-cyan mt-1 w-100" href="login.php">Ver Foro</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-body">
<h3>Próximos Eventos</h3>
<p>Participá de las hackathons de robótica y webinars en vivo pautados para este ciclo de desarrollo.</p>
<a class="btn btn-outline-cyan mt-1 w-100" href="login.php">Ver Cronograma</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-body">
<h3>Galería de Proyectos</h3>
<p>Inspirate inspeccionando los códigos y diagramas subidos por otros alumnos de la plataforma.</p>
<a class="btn btn-outline-cyan mt-1 w-100" href="login.php">Explorar Galería</a>
</div>
</article></div></div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
