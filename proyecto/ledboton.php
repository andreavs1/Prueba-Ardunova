
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a controlar un LED con un pulsador y Arduino paso a paso.">
    <title>Control de LED con Pulsador - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title mb-2">Control de LED con Pulsador</h1>
        <p class="section-subtitle">
            Aprendé a leer entradas digitales para encender un LED al presionar un botón.
        </p>
    </div>

    <div class="row g-4 align-items-stretch">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿Qué vamos a aprender?</h2>
                <p>
                    En este proyecto vamos a utilizar un pulsador como entrada
                    digital y un LED como salida. Arduino detecta si el botón
                    está presionado y controla el encendido del LED.
                </p>

                <h3>Objetivo</h3>
                <p>
                    Comprender cómo leer una entrada digital mediante
                    <code>digitalRead()</code> y controlar una salida con
                    <code>digitalWrite()</code>.
                </p>

                <h3>Lista de componentes</h3>
                <ul>
                    <li>Una placa Arduino UNO.</li>
                    <li>Un LED.</li>
                    <li>Un pulsador.</li>
                    <li>Una resistencia de 220 ohmios para el LED.</li>
                    <li>Una resistencia de 10 kiloohmios para el pulsador.</li>
                    <li>Una protoboard y cables jumper.</li>
                    <li>Un cable USB para conectar Arduino a la computadora.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-image text-center p-3">
                    <img
                        src="<?= BASE_URL ?>assets/img/ledBoton.jpg"
                        alt="Componentes del proyecto LED con pulsador"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5">
        <h2>Conexión de los cables</h2>
        <ul>
            <li>
                <strong>Pulsador:</strong> conectá un terminal a 5V y el otro
                al pin digital 2.
            </li>
            <li>
                <strong>Resistencia de 10 kΩ:</strong> conectala entre el pin 2
                y GND para mantener estable la lectura cuando el botón no está
                presionado.
            </li>
            <li>
                <strong>LED:</strong> conectá la pata larga al pin digital 13
                mediante una resistencia de 220 Ω.
            </li>
            <li>
                <strong>GND:</strong> conectá la pata corta del LED a GND
                mediante el circuito correspondiente.
            </li>
        </ul>
        <p>
            Antes de alimentar el circuito, verificá que las conexiones sean
            correctas y que el LED tenga su resistencia.
        </p>
    </section>

    <section class="mt-5">
        <h2>Procedimiento paso a paso</h2>
        <ol>
            <li>Prepará Arduino UNO, el pulsador, el LED y las resistencias.</li>
            <li>Armá el circuito siguiendo las conexiones indicadas.</li>
            <li>Abrí el IDE de Arduino en la computadora.</li>
            <li>Copiá el código de la sección siguiente.</li>
            <li>Seleccioná la placa Arduino UNO y el puerto correspondiente.</li>
            <li>Cargá el programa en la placa.</li>
            <li>Mantené presionado el pulsador y observá el LED.</li>
            <li>Soltá el pulsador y comprobá que el LED se apague.</li>
        </ol>
    </section>

    <section class="code-section mt-5">
        <h2>Código de Arduino</h2>
        <p>
            El programa lee el estado del pulsador y enciende el LED mientras
            el botón está presionado.
        </p>

        <pre class="codigo p-3 rounded"><code>const int botonPin = 2; // Pin donde conectamos el pulsador
const int ledPin = 13;  // Pin donde conectamos el LED

int estadoBoton = 0;    // Variable para guardar el estado del pulsador

void setup() {
    pinMode(ledPin, OUTPUT);
    pinMode(botonPin, INPUT);
}

void loop() {
    // Lee si el pulsador está presionado
    estadoBoton = digitalRead(botonPin);

    if (estadoBoton == HIGH) {
        digitalWrite(ledPin, HIGH); // Enciende el LED
    } else {
        digitalWrite(ledPin, LOW);  // Apaga el LED
    }
}</code></pre>
    </section>

    <section class="mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li>
                <code>const int botonPin = 2;</code> indica que el pulsador
                está conectado al pin digital 2.
            </li>
            <li>
                <code>const int ledPin = 13;</code> indica que el LED está
                conectado al pin digital 13.
            </li>
            <li>
                <code>int estadoBoton = 0;</code> crea una variable donde se
                guarda la lectura del pulsador.
            </li>
            <li>
                <code>setup()</code> se ejecuta una vez al iniciar el programa.
            </li>
            <li>
                <code>pinMode(ledPin, OUTPUT);</code> configura el pin del LED
                como salida.
            </li>
            <li>
                <code>pinMode(botonPin, INPUT);</code> configura el pin del
                pulsador como entrada.
            </li>
            <li>
                <code>digitalRead(botonPin);</code> lee el estado del pulsador.
            </li>
            <li>
                <code>if (estadoBoton == HIGH)</code> comprueba si el pulsador
                está presionado.
            </li>
            <li>
                <code>digitalWrite(ledPin, HIGH);</code> enciende el LED.
            </li>
            <li>
                <code>digitalWrite(ledPin, LOW);</code> apaga el LED cuando el
                pulsador no está presionado.
            </li>
            <li>
                <code>loop()</code> repite la lectura continuamente.
            </li>
        </ul>
    </section>

    <section class="mt-5">
        <h2>Resultado esperado</h2>
        <p>
            El LED permanece apagado cuando el pulsador está suelto y se
            enciende mientras mantenés presionado el botón. Al soltarlo,
            vuelve a apagarse.
        </p>
    </section>

    <div class="text-center button-container my-4">
        <a href="<?= BASE_URL ?>proyecto/proyectos.php" class="btn btn-outline-cyan">
            ← Volver a Proyectos
        </a>
    </div>

</main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
