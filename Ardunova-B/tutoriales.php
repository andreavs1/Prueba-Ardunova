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
<?php include 'includes/header.php'; ?>
<main>
<section class="text-center container section-container">
<h1 class="section-title">Tutoriales Académicos</h1>
<p>Aprendé desde cero con guías estructuradas metódicamente por niveles de complejidad.</p>
</section>
<section class="container section-container">
<h2 class="section-title">Últimas Publicaciones</h2>
<div class="row g-4">






<div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Interfaz de Arduino IDE" src="assets/img/arduino.jpg"/>
</div>
<div class="card-body">
<span class="tag-nivel principiante">Principiante</span>
<h3>Introducción a Arduino IDE</h3>
<p>Conocé el entorno de desarrollo oficial, cómo configurar los puertos COM y compilar tu primer sketch básico.</p>
<a class="btn btn-gradient mt-1 w-100" href="ledblink.php">Leer Tutorial</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Código de variables en Arduino" src="assets/img/variables.png"/>
</div>
<div class="card-body">
<span class="tag-nivel principiante">Principiante</span>
<h3>Variables y Tipos de Datos</h3>
<p>Estructurá eficientemente variables de tipo int, float, char y boolean para almacenar datos de sensores.</p>
<a class="btn btn-gradient mt-1 w-100" href="SemaforoA.html">Leer Tutorial</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Conexión de potenciómetro a placa Arduino" src="assets/img/entradas-analogicas.jpg"/>
</div>
<div class="card-body">
<span class="tag-nivel intermedio">Intermedio</span>
<h3>Lectura de Señales Analógicas</h3>
<p>Uso de la función analogRead() y mapeo de señales digitales obtenidas mediante potenciómetros de precisión.</p>
<a class="btn btn-gradient mt-1 w-100" href="SensorUltrasonico.html">Leer Tutorial</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Servomotor conectado a Arduino" src="assets/img/servo.jpg"/>
</div>
<div class="card-body">
<span class="tag-nivel intermedio">Intermedio</span>
<h3>Control de Servomotores</h3>
<p>Manipulación angular precisa de servomotores utilizando la librería nativa servo.h mediante pulsos PWM.</p>
<a class="btn btn-gradient mt-1 w-100" href="seguidorlinea.html">Leer Tutorial</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Pantalla LCD con módulo I2C" src="assets/img/i2c.png"/>
</div>
<div class="card-body">
<span class="tag-nivel avanzado">Avanzado</span>
<h3>Buses de Comunicación I2C</h3>
<p>Cómo interconectar pantallas o sensores utilizando únicamente dos cables lógicos de datos: SDA y SCL.</p>
<a class="btn btn-gradient mt-1 w-100" href="lcddinamica.html">Leer Tutorial</a>
</div>
</article></div><div class="col-12 col-sm-6 col-lg-4"><article class="card">
<div class="card-image">
<img alt="Esquema lógico de interrupciones por hardware" src="assets/img/interrupciones.png"/>
</div>
<div class="card-body">
<span class="tag-nivel avanzado">Avanzado</span>
<h3>Interrupción por Hardware</h3>
<p>Optimización del microcontrolador utilizando rutinas ISR para detectar eventos externos instantáneos.</p>
<a class="btn btn-gradient mt-1 w-100" href="domotica.html">Leer Tutorial</a>
</div>
</article></div></div>
</section>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
