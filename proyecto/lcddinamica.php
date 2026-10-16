
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tutorial de pantalla LCD dinámica con Arduino - ARDUNOVA">
    <title>Pantalla LCD Dinámica - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f7fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1000px;
        }

        h1 {
            color: #00bcd4;
            font-weight: bold;
        }

        h2 {
            color: #333;
            margin-top: 30px;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-outline-cyan {
            color: #00bcd4;
            border: 1px solid #00bcd4;
        }

        .btn-outline-cyan:hover {
            background-color: #00bcd4;
            color: white;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        pre {
            background-color: #222;
            color: #00ffcc;
            padding: 15px;
            border-radius: 10px;
            overflow-x: auto;
        }
    </style>
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container py-5">

    <div class="text-center mb-5">
        <h1>Pantalla LCD Dinámica</h1>
        <p class="lead">
            Aprende a utilizar una pantalla LCD con Arduino para mostrar información de manera dinámica.
        </p>
    </div>

    <div class="card p-4 mb-4">

        <h2>¿Qué es este proyecto?</h2>

        <p>
            En este proyecto aprenderemos a utilizar una pantalla LCD con Arduino.
            La pantalla LCD permite mostrar mensajes, valores de sensores y otra información
            que puede ser útil en diferentes proyectos de electrónica.
        </p>

        <img src="../assets/img/lcd-dinamica.jpg"
             alt="Pantalla LCD Dinámica"
             class="img-fluid rounded">

        <h2>Componentes necesarios</h2>

        <ul>
            <li>Arduino Uno</li>
            <li>Pantalla LCD 16x2</li>
            <li>Potenciómetro</li>
            <li>Resistencias</li>
            <li>Cables Dupont</li>
            <li>Protoboard</li>
            <li>Cable USB</li>
        </ul>

        <h2>Conexión de los componentes</h2>

        <p>
            La pantalla LCD debe conectarse al Arduino respetando cada uno de sus pines.
            El potenciómetro permite controlar el contraste de la pantalla.
        </p>

        <h2>¿Cómo funciona?</h2>

        <p>
            Arduino envía información a la pantalla LCD mediante sus conexiones.
            El programa indica qué texto debe aparecer y permite actualizar la información
            mostrada según las necesidades del proyecto.
        </p>

        <h2>Programación</h2>

        <p>
            Para controlar la pantalla LCD se utiliza una biblioteca que facilita la comunicación
            entre Arduino y el display.
        </p>

        <pre><code>#include &lt;LiquidCrystal.h&gt;

LiquidCrystal lcd(12, 11, 5, 4, 3, 2);

void setup() {
    lcd.begin(16, 2);
    lcd.print("Hola ARDUNOVA");
}

void loop() {
    lcd.setCursor(0, 1);
    lcd.print("Arduino");
}</code></pre>

        <h2>Proyecto terminado</h2>

        <img src="../assets/img/lcddinamica1.png"
             alt="Proyecto Pantalla LCD Dinámica"
             class="img-fluid rounded mt-3">

        <div class="text-center mt-4">
            <a href="proyectos.php" class="btn btn-outline-cyan">
                Volver a proyectos
            </a>
        </div>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

