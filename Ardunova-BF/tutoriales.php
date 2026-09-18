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
      <h1 class="section-title"> Tutoriales Academicos</h1>
      <p>Aprende arduino desde cero con guias organizadas por niveles de dificultad</p>
    </section>

    <section class="container section-container">
      <h2 class="section-title"> Niveles de aprendizaje</h2>
  
    <div class="row g-4">
              <div class="col-12 col-sm-6 col-lg-4">
                <article class="card h-100">
                 <div class="card-body">
                      <span class="tag-Nivel principiante">Principiante</span>
                      <h3>NIVEL PRINCIPIANTE</h3>
                      <p>Aprende los conceptos principales de Arduino, la placa, el entorno de 
                        programacion y los primeros proyectos.
                      </p>
                      <a class="btn btn-gradient mt-1 w-100" href="tutorial/nivelprincipiante.php">
                        Comenzar 
                      </a>
                 </div>
                </article>
              </div>

    
    <!-- Nivel intermedio -->
      <div class="col-12 col-sm-6 col-lg-4">
        <article class="card">
          <div class="card-body">
            <span class="tag-Nivel intermedio">Intermedio</span>
            <h3> NIVEL INTERMEDIO</h3>
            <p> Trabaja con sensores, entradas analogicas, motores y 
              diferentes componentes electronicos</p>
              <a class="btn btn-gradient mt-1 w-100" href="tutorial/nivelintermedio.php">
                Comenzar
              </a>
          </div>
          </article>
        </div>  
        
    
    <!-- Nivel avanzado -->
      <div class="col-12 col-sm-6 col-lg-4">
        <article class="card">
          <div class="card-body">
            <span class="tag-Nivel avanzado">Avanzado</span>
            <h3> NIVEL AVANZADO</h3>
            <p> Aprende comunicaciones, librerias y proyectos 
                 mas completos utilizando aurduino</p>
              <a class="btn btn-gradient mt-1 w-100" href="tutorial/nivelavanzado.php">
                Comenzar
              </a>
          </div>
          </article>
        </div> 
</section> 
  </main>
  <?php include 'includes/footer.php';?>
</body>
