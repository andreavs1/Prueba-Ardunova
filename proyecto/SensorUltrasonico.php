
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a medir distancias con el sensor ultrasónico HC-SR04 y Arduino paso a paso.">
    <title>Sensor Ultrasónico de Distancia - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">
    <div class="contenedor">

        <span class="tag-nivel intermedio">Intermedio</span>
        <h1 class="section-title">Sensor Ultrasónico de Distancia</h1>

        <p>
            En este proyecto vamos a aprender a medir la distancia entre el sensor
            ultrasónico HC-SR04 y un objeto utilizando una placa Arduino.
            El sensor utiliza ondas de sonido de alta frecuencia para calcular
            qué tan lejos se encuentra un objeto.
        </p>

        <div class="row g-4 align-items-stretch mt-2">
            <div class="col-12 col-lg-7">
                <div class="project-info">
                    <h2>¿Qué vamos a aprender?</h2>
                    <p>
                        Vamos a conectar el sensor a Arduino, enviar una señal
                        ultrasónica y medir el tiempo que tarda el eco en regresar.
                        Con ese tiempo, el programa calcula la distancia aproximada
                        en centímetros y la muestra en el Monitor Serie.
                    </p>

                    <h3>¿Para qué sirve este proyecto?</h3>
                    <p>
                        Este sensor puede utilizarse en proyectos de robótica,
                        alarmas de proximidad y robots que detectan obstáculos.
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-image text-center p-3">
                        <img
                            src="<?= BASE_URL ?>assets/img/ultrasonico.jpg"
                            alt="Sensor ultrasónico HC-SR04 utilizado con Arduino"
                            class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-5">
            <h2>Lista de componentes</h2>
            <ul>
                <li>Una placa Arduino UNO.</li>
                <li>Un sensor ultrasónico HC-SR04.</li>
                <li>Una protoboard, si es necesaria para el montaje.</li>
                <li>Cables jumper.</li>
                <li>Un cable USB para conectar Arduino a la computadora.</li>
            </ul>
        </section>

        <section class="mt-5">
            <h2>Conexión de los cables</h2>
            <p>
                Con el Arduino UNO y el sensor HC-SR04, realizá estas conexiones:
            </p>

            <div class="card my-3">
                <div class="card-body">
                    <ul class="mb-0">
                        <li><strong>VCC:</strong> conectalo al pin 5V de Arduino.</li>
                        <li><strong>Trig:</strong> conectalo al pin digital 9.</li>
                        <li><strong>Echo:</strong> conectalo al pin digital 8.</li>
                        <li><strong>GND:</strong> conectalo a GND de Arduino.</li>
                    </ul>
                </div>
            </div>

            <p>
                Antes de encender el circuito, revisá que cada cable esté conectado
                al pin correcto.
            </p>
        </section>

        <section class="mt-5">
            <h2>Procedimiento paso a paso</h2>
            <ol>
                <li>Prepará la placa Arduino UNO, el sensor y los cables.</li>
                <li>Conectá VCC a 5V y GND a GND.</li>
                <li>Conectá Trig al pin digital 9 y Echo al pin digital 8.</li>
                <li>Conectá Arduino a la computadora mediante el cable USB.</li>
                <li>Abrí el IDE de Arduino y copiá el código que aparece abajo.</li>
                <li>Seleccioná la placa y el puerto correctos y cargá el programa.</li>
                <li>Abrí el Monitor Serie y configurá la velocidad en 9600 baudios.</li>
                <li>Acercá o alejás un objeto frente al sensor y observá cómo cambia la distancia.</li>
            </ol>
        </section>

        <section class="mt-5">
            <h2>Código de Arduino</h2>
            <p>
                Este programa envía una señal desde Trig, mide cuánto tarda en
                regresar el eco por Echo y calcula la distancia aproximada en
                centímetros.
            </p>

            <pre class="codigo p-3 rounded"><code>const int pinTrig = 9;
const int pinEcho = 8;

void setup() {
    pinMode(pinTrig, OUTPUT);
    pinMode(pinEcho, INPUT);
    Serial.begin(9600);
}

void loop() {
    digitalWrite(pinTrig, LOW);
    delayMicroseconds(2);
    digitalWrite(pinTrig, HIGH);
    delayMicroseconds(10);
    digitalWrite(pinTrig, LOW);

    long duracion = pulseIn(pinEcho, HIGH);
    int distancia = duracion * 0.034 / 2;

    Serial.print("Distancia: ");
    Serial.print(distancia);
    Serial.println(" cm");
    delay(200);
}</code></pre>
        </section>

        <section class="mt-5">
            <h2>¿Cómo funciona el código?</h2>
            <ul>
                <li>
                    <code>const int pinTrig = 9;</code> guarda el número del pin
                    que envía la señal ultrasónica.
                </li>
                <li>
                    <code>const int pinEcho = 8;</code> guarda el pin que recibe
                    la señal de regreso.
                </li>
                <li>
                    <code>pinMode()</code> configura Trig como salida y Echo
                    como entrada.
                </li>
                <li>
                    <code>Serial.begin(9600);</code> permite enviar información
                    a la computadora a 9600 baudios.
                </li>
                <li>
                    <code>digitalWrite(pinTrig, HIGH);</code> activa brevemente
                    el pin Trig para que el sensor envíe el pulso ultrasónico.
                </li>
                <li>
                    <code>delayMicroseconds(10);</code> mantiene ese pulso
                    durante 10 microsegundos.
                </li>
                <li>
                    <code>pulseIn(pinEcho, HIGH)</code> mide cuánto tiempo
                    permanece en HIGH la señal recibida por Echo.
                </li>
                <li>
                    <code>duracion * 0.034 / 2</code> calcula la distancia
                    aproximada. El valor 0.034 representa aproximadamente la
                    velocidad del sonido en centímetros por microsegundo;
                    se divide por 2 porque el sonido va hasta el objeto y vuelve.
                </li>
                <li>
                    <code>Serial.print()</code> muestra el texto y el valor
                    calculado en el Monitor Serie.
                </li>
                <li>
                    <code>delay(200);</code> espera 200 milisegundos antes de
                    realizar otra medición.
                </li>
            </ul>
        </section>

        <section class="mt-5">
            <h2>Resultado esperado</h2>
            <p>
                Al ejecutar el programa, el Monitor Serie mostrará valores
                similares a <code>Distancia: 15 cm</code>. La cifra cambiará
                según la distancia entre el sensor y el objeto.
            </p>
            <p>
                Las mediciones son aproximadas y pueden variar según la superficie
                del objeto, el ángulo y las condiciones del entorno.
            </p>
        </section>

        <div class="text-center button-container my-4">
            <a href="<?= BASE_URL ?>proyecto/proyectos.php" class="btn btn-outline-cyan">
                ← Volver a Proyectos
            </a>
        </div>

    </div>
</main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
