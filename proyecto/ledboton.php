```php
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Proyecto de Arduino para controlar un LED mediante un botón.">

    <title>LED con Botón - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container">

    <div class="contenedor">

        <span class="tag-nivel basico">Básico</span>

        <h1 class="section-title">💡 LED con Botón</h1>

        <div class="row g-4 align-items-stretch">

            <div class="col-12 col-lg-7">

                <div class="project-info">

                    <h2>Sobre el proyecto</h2>

                    <p>
                        En este proyecto aprenderemos a controlar un LED utilizando
                        un botón conectado a una placa Arduino.
                    </p>

                    <p>
                        Al presionar el botón, Arduino detectará la señal y encenderá
                        el LED. Cuando se deje de presionar, el LED se apagará.
                    </p>

                    <h3>Objetivo</h3>

                    <p>
                        Aprender a utilizar entradas digitales para detectar el estado
                        de un botón y controlar una salida digital, como un LED.
                    </p>

                </div>

            </div>

            <div class="col-12 col-lg-5">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-image text-center p-3">

                        <img src="../assets/img/ledBoton.jpg"
                             alt="Componentes del proyecto LED con Botón"
                             class="img-fluid rounded">

                        <img src="../assets/img/ledBoton(2).jpg"
                             alt="Proyecto LED con Botón"
                             class="img-fluid rounded mt-3">

                    </div>

                </div>

            </div>

        </div>

        <section class="mt-5">

            <h2 class="mb-4">🧰 Componentes necesarios</h2>

            <ul class="list-group list-group-flush mb-4">

                <li class="list-group-item">
                    1x Placa Arduino UNO
                </li>

                <li class="list-group-item">
                    1x LED
                </li>

                <li class="list-group-item">
                    1x Botón pulsador
                </li>

                <li class="list-group-item">
                    1x Resistencia de 220 Ω
                </li>

                <li class="list-group-item">
                    1x Resistencia de 10 kΩ
                </li>

                <li class="list-group-item">
                    Protoboard
                </li>

                <li class="list-group-item">
                    Cables Dupont
                </li>

                <li class="list-group-item">
                    Cable USB
                </li>

            </ul>

            <h2 class="mb-4">🔌 Esquema de conexión</h2>

            <div class="card my-3">

                <div class="card-body">

                    <ul>

                        <li>
                            <strong>LED:</strong>
                            conectado al pin digital 13 mediante una resistencia de 220 Ω.
                        </li>

                        <li>
                            <strong>Botón:</strong>
                            conectado al pin digital 2.
                        </li>

                        <li>
                            <strong>GND:</strong>
                            conectado al negativo de la protoboard.
                        </li>

                        <li>
                            <strong>5V:</strong>
                            utilizado para alimentar el circuito.
                        </li>

                    </ul>

                </div>

            </div>

            <h2 class="mb-4">Pasos básicos</h2>

            <div class="row g-3">

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4 border rounded shadow-sm bg-white h-100">

                        <h4>1. Preparar</h4>

                        <p>
                            Colocá el LED y el botón en la protoboard y realizá
                            las conexiones correspondientes.
                        </p>

                    </div>

                </div>

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4 border rounded shadow-sm bg-white h-100">

                        <h4>2. Programar</h4>

                        <p>
                            Conectá Arduino a la computadora y cargá el código
                            del proyecto.
                        </p>

                    </div>

                </div>

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4 border rounded shadow-sm bg-white h-100">

                        <h4>3. Probar</h4>

                        <p>
                            Presioná el botón y comprobá que el LED se encienda.
                            Al soltarlo, el LED debe apagarse.
                        </p>

                    </div>

                </div>

            </div>

            <h2 class="mt-5 mb-4">💻 Código Fuente</h2>

            <pre class="codigo"><code>const int boton = 2;
const int led = 13;

void setup() {

    pinMode(boton, INPUT);
    pinMode(led, OUTPUT);

}

void loop() {

    int estadoBoton = digitalRead(boton);

    if (estadoBoton == HIGH) {

        digitalWrite(led, HIGH);

    } else {

        digitalWrite(led, LOW);

    }

}</code></pre>

            <h2 class="mt-5 mb-4">¿Cómo funciona?</h2>

            <p>
                Arduino revisa constantemente el estado del botón mediante
                el pin digital 2.
            </p>

            <p>
                Cuando el botón está presionado, Arduino recibe una señal
                y enciende el LED. Cuando el botón deja de presionarse,
                Arduino apaga el LED.
            </p>

        </section>

        <div class="text-center button-container my-4">

            <a href="proyectos.php" class="btn btn-outline-cyan">
                ← Volver a Proyectos
            </a>

        </div>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
```
