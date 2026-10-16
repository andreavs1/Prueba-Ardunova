```php
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tutorial de semáforo con Arduino - ARDUNOVA">
    <title>Semáforo con Arduino - ARDUNOVA</title>

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
        <h1>Semáforo con Arduino</h1>

        <p class="lead">
            Aprende a crear un semáforo utilizando Arduino y tres LEDs.
        </p>
    </div>

    <div class="card p-4 mb-4">

        <h2>¿Qué es este proyecto?</h2>

        <p>
            En este proyecto vamos a construir un pequeño semáforo utilizando
            Arduino y tres LEDs. Cada LED representa una de las luces de un
            semáforo: rojo, amarillo y verde.
        </p>

        <p>
            Arduino se encarga de controlar el encendido y apagado de cada LED
            siguiendo una secuencia determinada. De esta manera podemos
            representar el funcionamiento básico de un semáforo real.
        </p>

        <img src="../assets/img/semaforo-arduino.png"
             alt="Semáforo con Arduino"
             class="img-fluid rounded">

        <h2>Componentes necesarios</h2>

        <ul>
            <li>Arduino Uno</li>
            <li>1 LED rojo</li>
            <li>1 LED amarillo</li>
            <li>1 LED verde</li>
            <li>3 resistencias de 220 Ω</li>
            <li>Protoboard</li>
            <li>Cables Dupont</li>
            <li>Cable USB</li>
        </ul>

        <h2>Conexión de los componentes</h2>

        <p>
            Primero colocamos los tres LEDs en la protoboard. Cada LED debe
            conectarse a un pin digital de Arduino utilizando una resistencia
            para limitar la corriente.
        </p>

        <p>
            Una conexión posible es:
        </p>

        <ul>
            <li>LED rojo → pin digital 13</li>
            <li>LED amarillo → pin digital 12</li>
            <li>LED verde → pin digital 11</li>
        </ul>

        <p>
            Las patas negativas de los LEDs deben conectarse a GND mediante
            la protoboard.
        </p>

        <h2>¿Cómo funciona?</h2>

        <p>
            El programa en Arduino enciende cada LED durante un determinado
            tiempo y luego lo apaga para encender el siguiente.
        </p>

        <p>
            Primero se enciende la luz roja. Después de unos segundos se apaga
            y se enciende la luz verde. Finalmente, la luz amarilla se enciende
            antes de volver nuevamente a la luz roja.
        </p>

        <h2>Programación</h2>

        <p>
            El siguiente código permite controlar la secuencia de las tres
            luces del semáforo:
        </p>

        <pre><code>int rojo = 13;
int amarillo = 12;
int verde = 11;

void setup() {
    pinMode(rojo, OUTPUT);
    pinMode(amarillo, OUTPUT);
    pinMode(verde, OUTPUT);
}

void loop() {

    // Luz roja
    digitalWrite(rojo, HIGH);
    digitalWrite(amarillo, LOW);
    digitalWrite(verde, LOW);
    delay(5000);

    // Luz verde
    digitalWrite(rojo, LOW);
    digitalWrite(amarillo, LOW);
    digitalWrite(verde, HIGH);
    delay(5000);

    // Luz amarilla
    digitalWrite(rojo, LOW);
    digitalWrite(amarillo, HIGH);
    digitalWrite(verde, LOW);
    delay(2000);
}</code></pre>

        <h2>Explicación del código</h2>

        <p>
            Las variables <strong>rojo</strong>, <strong>amarillo</strong> y
            <strong>verde</strong> indican en qué pines digitales están
            conectados los LEDs.
        </p>

        <p>
            En la función <strong>setup()</strong> se configuran esos pines
            como salidas utilizando <strong>pinMode()</strong>.
        </p>

        <p>
            En la función <strong>loop()</strong> se controla la secuencia
            utilizando <strong>digitalWrite()</strong>. El comando
            <strong>delay()</strong> permite mantener cada luz encendida
            durante el tiempo indicado.
        </p>

        <h2>Proyecto terminado</h2>

        <img src="../assets/img/semaforo1.png"
             alt="Proyecto semáforo con Arduino"
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
```
