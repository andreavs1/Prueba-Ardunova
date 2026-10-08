<?php
session_start();
$active_page = 'tutoriales';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ARDUNOVA - Aprendizaje práctico de Arduino, electrónica y robótica.">
  <title>Tutoriales - ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <?php include 'includes/header.php';?>

  <main>
    <section class="text-center container section-container">
      <h1 class="section-title">Tutoriales Académicos</h1>
      <p>Aprende Arduino desde cero con guías organizadas por niveles de dificultad</p>
    </section>

    <section class="container section-container">
      <h2 class="section-title">Niveles de aprendizaje</h2>
  
      <div class="row g-4">
        <!-- Nivel Principiante -->
        <div class="col-12 col-sm-6 col-lg-4">
          <article class="card h-100">
            <div class="card-image">
              <img src="/Ardunova-N/assets/img/principiante.png" alt="Principiante" class="card-img-top">
            </div>
            <div class="card-body">
              <span class="tag-Nivel principiante">Principiante</span>
              <h3>NIVEL PRINCIPIANTE</h3>
              <p>Aprende los conceptos principales de Arduino, el entorno de programación y los primeros proyectos.</p>
              <a class="btn btn-gradient mt-1 w-100" href="principiantes/principiantes.php">
                Comenzar 
              </a>
            </div>
          </article>
        </div>

        <!-- Nivel Intermedio -->
        <div class="col-12 col-sm-6 col-lg-4">
          <article class="card h-100">
            <div class="card-image">
              <img src="/Ardunova-N/assets/img/intermedio.jpg" alt="Intermedio" class="card-img-top">
            </div>
            <div class="card-body">
              <span class="tag-Nivel intermedio">Intermedio</span>
              <h3>NIVEL INTERMEDIO</h3>
              <p>Trabaja con sensores, entradas analógicas, motores y diferentes componentes electrónicos.</p>
              <a class="btn btn-gradient mt-1 w-100" href="intermedio/intermedio.php">
                Comenzar
              </a>
            </div>
          </article>
        </div>

        <!-- Nivel Avanzado -->
        <div class="col-12 col-sm-6 col-lg-4">
          <article class="card h-100">
            <div class="card-image">
              <img src="/Ardunova-N/assets/img/avanzado.png" alt="Avanzado" class="card-img-top">
            </div>
            <div class="card-body">
              <span class="tag-Nivel avanzado">Avanzado</span>
              <h3>NIVEL AVANZADO</h3>
              <p>Aprende comunicaciones, librerías y proyectos más completos utilizando Arduino.</p>
              <a class="btn btn-gradient mt-1 w-100" href="avanzado/avanzado.php">
                Comenzar
              </a>
            </div>
          </article>
        </div> 
      </div>
    </section> 

    <!-- Contenedor dinámico donde tu JS renderiza los tutoriales -->
    <div id="app-tutorial" class="container mt-4"></div>
  </main>

  <?php include 'includes/chatbot.php'; ?>
  <?php include 'includes/footer.php';?>

  <!-- Carga de JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/tutorial-engine.js"></script>
</body>
</html>