<?php
session_start();
$active_page = 'tutoriales';
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Nivel Principiante - ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
 
<main>
<?php include __DIR__ . '/..//includes/header.php';
?>
<section class="text-center container section-container">

<h1 class="section-title">
🟢 Nivel Principiante

</h1>

<p>
Elegí el tutorial que querés aprender.
</p>

</section>



<section class="container section-container">


<div class="row g-4">



<!-- TUTORIAL 1 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 1
</span>

<h3>
¿Qué es Arduino?
</h3>

<p>
Conocé qué es Arduino y para qué sirve.
</p>

<a class="btn btn-gradient mt-1 w-100" href="01-que-es-arduino.php">
Ver tutorial
</a>

</div>

</article>

</div>



<!-- TUTORIAL 2 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 2
</span>

<h3>
Placa Arduino
</h3>

<p>
Partes principales de la placa y conexiones.
</p>

<a class="btn btn-gradient mt-1 w-100" href="02-placa-arduino.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 3 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 3
</span>

<h3>
Arduino IDE
</h3>

<p>
Programa utilizado para escribir códigos.
</p>

<a class="btn btn-gradient mt-1 w-100" href="03-arduino-ide.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 4 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 4
</span>

<h3>
Estructura del programa
</h3>

<p>
Aprendé cómo funcionan setup() y loop().
</p>

<a class="btn btn-gradient mt-1 w-100" href="04-estructura-programa.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 5 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 5
</span>

<h3>
Variables
</h3>

<p>
Uso de datos dentro de Arduino.
</p>

<a class="btn btn-gradient mt-1 w-100" href="05-variables.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 6 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 6
</span>

<h3>
Entradas y salidas
</h3>

<p>
Control de componentes mediante Arduino.
</p>

<a class="btn btn-gradient mt-1 w-100" href="06-entradas-salidas.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 7 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 7
</span>

<h3>
Encender LED
</h3>

<p>
Primer proyecto práctico con Arduino.
</p>

<a class="btn btn-gradient mt-1 w-100" href="07-led.php">
Ver tutorial
</a>

</div>

</article>

</div>




<!-- TUTORIAL 8 -->

<div class="col-12 col-sm-6 col-lg-4">

<article class="card">

<div class="card-body">

<span class="tag-nivel principiante">
Tutorial 8
</span>

<h3>
Pulsadores
</h3>

<p>
Uso de botones para controlar Arduino.
</p>

<a class="btn btn-gradient mt-1 w-100" href="08-pulsadores.php">
Ver tutorial
</a>

</div>

</article>

</div>



</div>


</section>


</main>


<?php include __DIR__ . '/../includes/footer.php';?>


</body>

</html>