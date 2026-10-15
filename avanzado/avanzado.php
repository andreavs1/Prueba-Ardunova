<?php
session_start();
$active_page = 'tutoriales';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nivel Avanzado - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main>

<section class="text-center container section-container">
    <h1 class="section-title">🔴 Nivel Avanzado</h1>
    <p>Elegí el tutorial que querés aprender paso a paso.</p>
</section>

<section class="container section-container">
    <div class="row g-4">

        <!-- TUTORIAL 17 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/librerias.png" alt="Librerías" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 17</span>
                    <h3>Librerías</h3>
                    <p>Uso de librerías para ampliar las funciones de Arduino.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=17">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 18 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/lcd.jpg" alt="Pantallas LCD" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 18</span>
                    <h3>Pantallas LCD</h3>
                    <p>Mostrar información utilizando pantallas conectadas a Arduino.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=18">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 19 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/bluetooth.jpg" alt="Comunicación Bluetooth" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 19</span>
                    <h3>Comunicación Bluetooth</h3>
                    <p>Control y envío de información de manera inalámbrica.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=19">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 20 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/wifi.jpg" alt="Comunicación Wi-Fi" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 20</span>
                    <h3>Comunicación Wi-Fi</h3>
                    <p>Conexión de Arduino a redes inalámbricas e IoT.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=20">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 21 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/i2c.png" alt="Comunicación I2C" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 21</span>
                    <h3>Comunicación I2C</h3>
                    <p>Conexión de dispositivos usando el protocolo I2C.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=21">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 22 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/comunicacion.png" alt="Comunicación SPI" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 22</span>
                    <h3>Comunicación SPI</h3>
                    <p>Intercambio de información a alta velocidad con perisféricos.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=22">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 23 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/componentes.png" alt="Varios componentes" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 23</span>
                    <h3>Varios componentes</h3>
                    <p>Uso e integración de múltiples elementos en un proyecto.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=23">Ver tutorial</a>
                </div>
            </article>
        </div>

        <!-- TUTORIAL 24 -->
        <div class="col-12 col-sm-6 col-lg-4">
            <article class="card">
                <div class="card-image">
                    <img src="../assets/img/errores.png" alt="Solución de errores" class="card-img-top">
                </div>
                <div class="card-body">
                    <span class="tag-nivel avanzado">Tutorial 24</span>
                    <h3>Solución de errores</h3>
                    <p>Métodos para encontrar y corregir problemas en proyectos.</p>
                    <a class="btn btn-gradient mt-1 w-100" href="tutorial.avanzado.php?id=24">Ver tutorial</a>
                </div>
            </article>
        </div>

    </div>
</section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>