                                                                                                                                                                                                                                                    
<?php
session_start();
$active_page = 'tutoriales';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nivel Intermedio - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

<section class="text-center container section-container">
    <h1 class="section-title">🟡 Nivel Intermedio</h1>
    <p>Elegí el tutorial que querés aprender.</p>
</section>

<section class="container section-container">
    <div class="row g-4">

        <!-- TUTORIAL 9 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/condicionales.png" alt="Condicionales" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 9</span>
                    <h3>Condicionales</h3>
                    <p>Aprendé a tomar decisiones utilizando if y else.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="09-condicionales.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 10 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                 <div class="card-image">
                    <img src="/Ardunova-N/assets/img/bucle.png" alt="Bucles" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 10</span>
                    <h3>Bucles</h3>
                    <p>Repetición de acciones utilizando estructuras de control.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="10-bucles.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 11 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/sensores.jpg" alt="Sensores" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 11</span>
                    <h3>Sensores</h3>
                    <p>Aprendé cómo Arduino recibe información del ambiente.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="11-sensores.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 12 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/lecanalogicas.png" alt="Lecturas analógicas" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 12</span>
                    <h3>Lecturas analógicas</h3>
                    <p>Uso de entradas analógicas para leer valores variables.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="12-lecturas-analogicas.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 13 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/bucle.png" alt="Bucles" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 13</span>
                    <h3>Potenciómetro</h3>
                    <p>Control de valores mediante una resistencia variable.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="13-potenciometro.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 14 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/sensor-hc-sr04.png" alt="Sensor HC-SR04" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 14</span>
                    <h3>Sensor HC-SR04</h3>
                    <p>Medición de distancia mediante ultrasonido.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="14-hc-sr04.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 15 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/servomotor.png" alt="Servomotores" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 15</span>
                    <h3>Servomotores</h3>
                    <p>Control de movimientos y posiciones con Arduino.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="15-servomotores.php">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 16 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="/Ardunova-N/assets/img/monitor-serial.png" alt="Monitor Serial" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel intermedio">Tutorial 16</span>
                    <h3>Monitor Serial</h3>
                    <p>Visualización de datos enviados por Arduino.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="16-monitor-serial.php">Ver tutorial</a>
                </div>
            </article>
        </div>

    </div>
</section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>