
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a construir un robot con Arduino y un sensor ultrasónico HC-SR04 para detectar y esquivar obstáculos.">
    <title>Robot Esquivador de Obstáculos - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel intermedio">Intermedio</span>
        <h1 class="section-title mb-2">Robot Esquivador de Obstáculos</h1>
        <p class="section-subtitle">
            Construí un robot móvil que mide la distancia a los objetos
            y cambia de dirección para evitar choques.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿De qué trata este proyecto?</h2>
                <p>
                    Este proyecto utiliza un Arduino UNO, un sensor
                    ultrasónico HC-SR04 y un controlador de motores L298N.
                    El sensor mide la distancia que hay entre el robot
                    y un objeto ubicado delante de él.
                </p>
                <p>
                    Cuando detecta un obstáculo a menos de 20 centímetros,
                    el robot se detiene, retrocede y gira a la izquierda.
                    Si no detecta un obstáculo dentro de esa distancia,
                    continúa avanzando.
                </p>

                <h3>Objetivo</h3>
                <p>
                    Aprender a medir distancias con un sensor ultrasónico,
                    utilizar condiciones en Arduino y controlar motores
                    para realizar movimientos automáticos.
                </p>

                <h3>Materiales</h3>
                <ul>
                    <li>Arduino UNO.</li>
                    <li>Chasis de robot de dos ruedas con motores DC.</li>
                    <li>Controlador de motores L298N.</li>
                    <li>Sensor ultrasónico HC-SR04.</li>
                    <li>Batería o fuente de alimentación adecuada para los motores.</li>
                    <li>Cables de conexión.</li>
                    <li>Protoboard, si es necesaria para el montaje.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100">
                <div class="card-image">
                    <img
                        src="<?= BASE_URL ?>assets/img/robotobstaculos.jpg"
                        alt="Componentes del robot esquivador de obstáculos"
                        class="img-fluid"
                    >
                </div>
            </div>
        </div>
    </div>

    <section class="project-info mt-5">
        <h2>Conexiones</h2>

        <h3>1. Sensor ultrasónico HC-SR04</h3>
        <ul>
            <li><strong>VCC:</strong> a 5V del Arduino.</li>
            <li><strong>GND:</strong> a GND del Arduino.</li>
            <li><strong>Trig:</strong> al pin digital 9.</li>
            <li><strong>Echo:</strong> al pin digital 8.</li>
        </ul>

        <h3>2. Controlador de motores L298N</h3>
        <ul>
            <li><strong>IN1:</strong> al pin digital 2.</li>
            <li><strong>IN2:</strong> al pin digital 3.</li>
            <li><strong>IN3:</strong> al pin digital 4.</li>
            <li><strong>IN4:</strong> al pin digital 5.</li>
            <li><strong>OUT1 y OUT2:</strong> a los terminales de un motor.</li>
            <li><strong>OUT3 y OUT4:</strong> a los terminales del otro motor.</li>
            <li><strong>GND:</strong> conectar con GND del Arduino y la referencia de la alimentación, según el esquema del módulo.</li>
        </ul>

        <p>
            El driver necesita una alimentación apropiada para los motores.
            Revisá también que las entradas de habilitación ENA y ENB estén
            configuradas para permitir el movimiento. No alimentes los
            motores directamente desde los pines del Arduino.
        </p>

        <p>
            <strong>Seguridad:</strong> antes de encenderlo, revisá todas
            las conexiones. Hacé las primeras pruebas con una alimentación
            de baja tensión adecuada y mantené las ruedas levantadas del
            suelo mientras comprobás el sentido de giro.
        </p>
    </section>

    <section class="code-section mt-5">
        <h2>Código Arduino</h2>
        <p>
            Copiá el programa en el IDE de Arduino, seleccioná la placa
            y el puerto correctos, y cargalo en el Arduino UNO.
        </p>

        <div class="card code-card">
<pre><code>// Pines del sensor ultrasónico
const int trigPin = 9;
const int echoPin = 8;

// Pines del controlador de motores L298N
const int motorIzquierda1 = 2;
const int motorIzquierda2 = 3;
const int motorDerecha1 = 4;
const int motorDerecha2 = 5;

const int umbralDistancia = 20; // Distancia límite en centímetros

void setup() {
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);

  pinMode(motorIzquierda1, OUTPUT);
  pinMode(motorIzquierda2, OUTPUT);
  pinMode(motorDerecha1, OUTPUT);
  pinMode(motorDerecha2, OUTPUT);
}

void loop() {
  long duracion;
  int distancia;

  // Medición de distancia con HC-SR04
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  duracion = pulseIn(echoPin, HIGH);
  distancia = duracion * 0.034 / 2;

  if (distancia > 0 && distancia < umbralDistancia) {
    // Obstáculo cerca: detener, retroceder y girar
    detener();
    delay(200);
    retroceder();
    delay(400);
    girarIzquierda();
    delay(500);
  } else {
    // Camino libre: avanzar
    avanzar();
  }
}

// Funciones de control de movimiento
void avanzar() {
  digitalWrite(motorIzquierda1, HIGH);
  digitalWrite(motorIzquierda2, LOW);
  digitalWrite(motorDerecha1, HIGH);
  digitalWrite(motorDerecha2, LOW);
}

void retroceder() {
  digitalWrite(motorIzquierda1, LOW);
  digitalWrite(motorIzquierda2, HIGH);
  digitalWrite(motorDerecha1, LOW);
  digitalWrite(motorDerecha2, HIGH);
}

void girarIzquierda() {
  digitalWrite(motorIzquierda1, LOW);
  digitalWrite(motorIzquierda2, HIGH);
  digitalWrite(motorDerecha1, HIGH);
  digitalWrite(motorDerecha2, LOW);
}

void detener() {
  digitalWrite(motorIzquierda1, LOW);
  digitalWrite(motorIzquierda2, LOW);
  digitalWrite(motorDerecha1, LOW);
  digitalWrite(motorDerecha2, LOW);
}</code></pre>
        </div>
    </section>

    <section class="project-info mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li>
                <code>trigPin</code> y <code>echoPin</code> identifican
                los pines que utiliza el sensor para enviar y recibir
                la señal ultrasónica.
            </li>
            <li>
                Las variables <code>motorIzquierda1</code>,
                <code>motorIzquierda2</code>, <code>motorDerecha1</code>
                y <code>motorDerecha2</code> controlan los motores.
            </li>
            <li>
                <code>umbralDistancia = 20</code> establece el límite
                de distancia en centímetros.
            </li>
            <li>
                <code>digitalWrite()</code> envía señales al sensor
                y al controlador de motores.
            </li>
            <li>
                <code>pulseIn(echoPin, HIGH)</code> mide cuánto tiempo
                permanece activa la señal de respuesta del sensor.
            </li>
            <li>
                <code>duracion * 0.034 / 2</code> calcula una distancia
                aproximada en centímetros a partir del tiempo medido.
                Se divide por dos porque el sonido va hasta el objeto
                y vuelve al sensor.
            </li>
            <li>
                <code>if</code> comprueba si la distancia es mayor que
                cero y menor que 20 centímetros.
            </li>
            <li>
                <code>detener()</code>, <code>retroceder()</code> y
                <code>girarIzquierda()</code> son funciones que organizan
                las instrucciones para cada movimiento.
            </li>
            <li>
                <code>delay()</code> espera una cantidad de milisegundos
                antes de continuar con la siguiente acción.
            </li>
        </ul>

        <p>
            <strong>A tener en cuenta:</strong> los tiempos de retroceso
            y giro son valores de prueba. El movimiento real depende de
            los motores, las ruedas, la batería y la superficie. Si el
            robot gira hacia el lado equivocado, revisá el cableado y
            la orientación de los motores.
        </p>
    </section>

    <section class="steps-section mt-5">
        <h2 class="mb-4">Paso a paso</h2>

        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>1. Armá el chasis</h4>
                    <p>
                        Instalá los motores y las ruedas. Sujetá el Arduino,
                        el driver y el sensor ultrasónico al chasis.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>2. Conectá y programá</h4>
                    <p>
                        Realizá las conexiones siguiendo el esquema,
                        verificá la alimentación y cargá el código
                        desde el IDE de Arduino.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>3. Realizá una prueba</h4>
                    <p>
                        Probá primero los motores con las ruedas levantadas.
                        Después colocá el robot en una superficie despejada
                        y usá un objeto para comprobar la detección.
                    </p>
                </div>
            </div>
        </div>

        <div class="result-card mt-4">
            <h4>Resultado esperado</h4>
            <p class="mb-0">
                El robot avanza mientras no detecta un obstáculo a menos
                de 20 centímetros. Cuando lo detecta, se detiene,
                retrocede y gira a la izquierda antes de continuar.
            </p>
        </div>

        <div class="text-center button-container mt-4">
            <a href="<?= BASE_URL ?>proyecto/proyectos.php"
               class="btn btn-outline-cyan">
                ← Volver a Proyectos
            </a>
        </div>
    </section>

</main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
