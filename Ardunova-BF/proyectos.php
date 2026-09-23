<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="ARDUNOVA - Aprendizaje práctico de Arduino, electrónica y robótica.">
  <title>Proyectos Prácticos - ARDUNOVA</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<?php include 'includes/header.php'; ?>

<main class="container section-container">

  <h1 class="section-title">Proyectos Prácticos</h1>

  <div class="filtros">

  <label for="filtro-nivel">Filtrar por nivel:</label>
  <select id="filtro-nivel" class="filtro-select">
    <option value="todos">Todos</option>
    <option value="principiante">Principiante</option>
    <option value="intermedio">Intermedio</option>
    <option value="avanzado">Avanzado</option>
  </select>

  </div>

  <div class="row g-4">
<!-- Proyecto 1 -->
<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="principiante">

  <article class="card">

    <div class="card-image">
      <img alt="Pantalla LCD" src="assets/img/lcd.jpg">
    </div>

    <div class="card-body">

      <span class="tag-nivel principiante">
        Principiante
      </span>

      <h3>
        Parpadeo de LED (Blink)
      </h3>

      <p>
        El clásico "Hola Mundo" del hardware. Aprendé el control básico del ciclo de procesamiento interno de salidas digitales.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="ledblink.php">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 2 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="intermedio">

  <article class="card">

    <div class="card-image">
      <img alt="Pantalla LCD Dinamica" src="assets/img/lcd-dinamica.jpg">
    </div>

    <div class="card-body">

      <span class="tag-nivel intermedio">
        Intermedio
      </span>

      <h3>
        Pantalla LCD Dinámica
      </h3>

      <p>
        Desplegá textos fijos y dinámicos con desplazamiento lateral programado controlando el contraste del dispositivo.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="lcddinamica.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 3 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="principiante">

  <article class="card">

    <div class="card-image">
      <img alt="Semaforo Basico Arduino" src="assets/img/semaforo-arduino.png">
    </div>

    <div class="card-body">

      <span class="tag-nivel principiante">
        Principiante
      </span>

      <h3>
        Semáforo Inteligente
      </h3>

      <p>
        Diseño funcional de un cruce peatonal sincronizado empleando temporizaciones algorítmicas secuenciales.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="SemaforoA.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 4 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="intermedio">

  <article class="card">

    <div class="card-image">
      <img alt="Sensor Ultrasonico De Distancia" src="assets/img/ultrasonico.jpg">
    </div>

    <div class="card-body">

      <span class="tag-nivel intermedio">
        Intermedio
      </span>

      <h3>
        Sensor Ultrasónico de Distancia
      </h3>

      <p>
        Medición precisa de proximidad calculando el tiempo de retorno de ondas de sonido de alta frecuencia.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="SensorUltrasonico.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 5 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="intermedio">

  <article class="card">

    <div class="card-image">
      <img alt="Domotica" src="assets/img/domotica.jpg">
    </div>

    <div class="card-body">

      <span class="tag-nivel intermedio">
        Intermedio
      </span>

      <h3>
        Domótica Básica
      </h3>

      <p>
        Automatizá el encendido de luces de tu hogar utilizando relevadores eléctricos seguros y sensores de presencia.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="domotica.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 6 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="avanzado">

  <article class="card">

    <div class="card-image">
      <img alt="Auto Seguidor de Linea" src="assets/img/robot-seguidor-linea.png">
    </div>

    <div class="card-body">

      <span class="tag-nivel avanzado">
        Avanzado
      </span>

      <h3>
        Auto Seguidor de Línea
      </h3>

      <p>
        Integración total de motores de corriente continua, puentes H de potencia y algoritmos lógicos PID.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="seguidorlinea.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>
  </div>
</main>

<!-- Proyecto 7 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="principiante">

  <article class="card">

    <div class="card-image">
      <img alt="LED con botón" src="assets/img/led-boton.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel principiante">
        Principiante
      </span>

      <h3>
        LED con botón
      </h3>

      <p>
        Aprendé a controlar un LED utilizando un botón para encenderlo y apagarlo.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="ledboton.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 8 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="principiante">

  <article class="card">

    <div class="card-image">
      <img alt="Potenciómetro y LED" src="assets/img/potenciometro.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel principiante">
        Principiante
      </span>

      <h3>
        LED con potenciómetro
      </h3>

      <p>
        Utilizá un potenciómetro para controlar de manera gradual la intensidad de un LED.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="potenciometro.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 9 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="principiante">

  <article class="card">

    <div class="card-image">
      <img alt="LDR y LEDs" src="assets/img/ldr.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel principiante">
        Principiante
      </span>

      <h3>
        LDR y tres LEDs
      </h3>

      <p>
        Medí la cantidad de luz utilizando un sensor LDR y controlá diferentes LEDs según la iluminación.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="ldr.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 10 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="intermedio">

  <article class="card">

    <div class="card-image">
      <img alt="Servomotor con potenciómetro" src="assets/img/servomotor.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel intermedio">
        Intermedio
      </span>

      <h3>
        Servomotor con potenciómetro
      </h3>

      <p>
        Controlá el movimiento de un servomotor utilizando un potenciómetro para modificar su posición.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="servomotor.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 11 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="intermedio">

  <article class="card">

    <div class="card-image">
      <img alt="Sistema de riego automático" src="assets/img/riego.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel intermedio">
        Intermedio
      </span>

      <h3>
        Sistema de riego automático
      </h3>

      <p>
        Detectá la humedad del suelo y activá automáticamente un sistema de riego cuando sea necesario.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="riego.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<!-- Proyecto 12 -->

<div class="col-12 col-sm-6 col-lg-4 proyecto" data-nivel="avanzado">

  <article class="card">

    <div class="card-image">
      <img alt="Robot evita obstáculos" src="assets/img/robot-obstaculos.jpeg">
    </div>

    <div class="card-body">

      <span class="tag-nivel avanzado">
        Avanzado
      </span>

      <h3>
        Robot evita obstáculos
      </h3>

      <p>
        Construí un robot capaz de detectar obstáculos y cambiar su dirección para evitarlos.
      </p>

      <a class="btn btn-gradient mt-1 w-100" href="robotobstaculos.html">
        Ver Proyecto
      </a>

    </div>

  </article>

</div>


<?php include 'includes/footer.php'; ?>

<script>
  const selectFiltro = document.getElementById("filtro-nivel");
  const proyectos = document.querySelectorAll(".proyecto");

  selectFiltro.addEventListener("change", function() {
    let nivel = this.value;

    proyectos.forEach(function(proyecto) {
      if (nivel === "todos" || proyecto.dataset.nivel === nivel) {
        proyecto.style.display = ""; 
      } else {
        proyecto.style.display = "none";
      }
    });
  });
</script>

