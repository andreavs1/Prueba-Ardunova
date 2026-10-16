<?php
session_start();
$active_page = 'nosotros';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ARDUNOVA - Aprendizaje práctico de Arduino, electrónica y robótica.">
  <title>Nosotros - ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="container section-container">
<h1 class="section-title text-center">Nuestra Historia</h1>
<div class="row g-4">


<div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-body text-center">
<h3>Misión</h3>
<p>Acercar los cimientos de la tecnología abierta a estudiantes, brindando recursos claros para asimilar, estructurar y crear soluciones del mundo real.</p>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-body text-center">
<h3>Visión</h3>
<p>Consolidarnos como el portal educativo de referencia en electrónica didáctica, eliminando las barreras de complejidad inicial en hardware libre.</p>
</div>
</article></div></div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
