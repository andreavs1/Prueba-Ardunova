
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a construir y programar un auto seguidor de línea con Arduino, sensores infrarrojos y un driver L298N.">
    <title>Auto Seguidor de Línea - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel avanzado">Avanzado</span>
        <h1 class="section-title mb-2">Auto Seguidor de Línea</h1>
        <p class="section-subtitle">
            Construí un robot móvil que detecta una línea en el suelo
            y modifica su dirección automáticamente.
        </p>
    </div>

    <div class="row g-4 align-items-stretch">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿De qué trata este proyecto?</h2>
                <p>
                    El auto seguidor de línea es un robot que utiliza sensores
                    infrarrojos para detectar una trayectoria marcada en el
                    suelo. Según las señales que reciben los sensores, el
                    Arduino decide si el vehículo debe avanzar, girar o detenerse.
                </p>
                <p>
                    Para controlar los motores se utiliza un driver L298N,
                    que permite manejar el sentido de giro de los motores
                    de corriente continua.
                </p>

                <h3>Objetivo</h3>
                <p>
                    Aprender a leer sensores digitales, utilizar condiciones
                    en Arduino y controlar dos motores para que el robot
                    siga una línea.
                </p>

                <h3>¿Qué vas a aprender?</h3>
                <ul>
                    <li>Leer sensores infrarrojos con entradas digitales.</li>
                    <li>Usar condiciones <code>if</code> y <code>else</code>.</li>
                    <li>Controlar motores mediante un puente H L298N.</li>
                    <li>Combinar sensores y motores en un robot autónomo.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100">
                <div class="card-image text-center p-3">
                    <img
                        src="<?= BASE_URL ?>assets/img/robot-seguidorlinea(1).jpg"
                        alt="Robot auto seguidor de línea"
                        class="img-fluid rounded"
                    >
                </div>
            </div>
        </div>
    </div>

    <section class="project-info mt-5">
        <h2>Materiales necesarios</h2>
        <ul>
            <li>Placa Arduino UNO.</li>
            <li>Chasis 2WD con dos motores DC y rueda loca.</li>
            <li>Driver puente H L298N.</li>
            <li>Dos sensores infrarrojos TCRT5000 con salida digital.</li>
            <li>Batería o fuente de alimentación adecuada para los motores.</li>
            <li>Cables de conexión.</li>
            <li>Pista clara con una línea negra para realizar las pruebas.</li>
        </ul>
    </section>

    <section class="project-info mt-5">
        <h2>Conexiones</h2>

        <h3>1. Sensores infrarrojos</h3>
        <ul>
            <li>Salida digital del sensor izquierdo: pin 2 del Arduino.</li>
            <li>Salida digital del sensor derecho: pin 3 del Arduino.</li>
            <li>VCC y GND: alimentación y tierra, según las especificaciones del módulo.</li>
        </ul>

        <h3>2. Driver L298N</h3>
        <ul>
            <li>IN1: pin 4 del Arduino.</li>
            <li>IN2: pin 5 del Arduino.</li>
            <li>IN3: pin 6 del Arduino.</li>
            <li>IN4: pin 7 del Arduino.</li>
            <li>OUT1 y OUT2: conexiones de uno de los motores.</li>
            <li>OUT3 y OUT4: conexiones del otro motor.</li>
            <li>GND del driver: conectar con GND del Arduino para compartir referencia eléctrica.</li>
        </ul>

        <p>
            <strong>Importante:</strong> el driver también necesita una
            alimentación apropiada para los motores. Revisá las instrucciones
            del módulo y la conexión de ENA y ENB: deben estar habilitados
            para que los motores funcionen. No conectes los motores
            directamente a los pines del Arduino.
        </p>

        <p>
            Las conexiones de los motores pueden variar según el armado.
            Si el robot gira al revés, revisá la orientación de los motores
            y las conexiones antes de modificar el programa.
        </p>
    </section>

    <section class="code-section mt-5">
        <h2>Código Arduino</h2>
        <p>
            Este programa conserva los pines y las condiciones de tu código
            original.
        </p>

        <div class="card code-card">
<pre><code>const int sIzq = 2, sDer = 3;
const int IN1 = 4, IN2 = 5, IN3 = 6, IN4 = 7;

void setup() {
    pinMode(sIzq, INPUT);
    pinMode(sDer, INPUT);
    pinMode(IN1, OUTPUT);
    pinMode(IN2, OUTPUT);
    pinMode(IN3, OUTPUT);
    pinMode(IN4, OUTPUT);
}

void loop() {
    int valIzq = digitalRead(sIzq);
    int valDer = digitalRead(sDer);

    if (valIzq == LOW && valDer == LOW) {
        // Avanzar
        digitalWrite(IN1, HIGH);
        digitalWrite(IN2, LOW);
        digitalWrite(IN3, HIGH);
        digitalWrite(IN4, LOW);

    } else if (valIzq == HIGH && valDer == LOW) {
        // Giro a la izquierda
        digitalWrite(IN1, LOW);
        digitalWrite(IN2, LOW);
        digitalWrite(IN3, HIGH);
        digitalWrite(IN4, LOW);

    } else if (valIzq == LOW && valDer == HIGH) {
        // Giro a la derecha
        digitalWrite(IN1, HIGH);
        digitalWrite(IN2, LOW);
        digitalWrite(IN3, LOW);
        digitalWrite(IN4, LOW);

    } else {
        // Detener
        digitalWrite(IN1, LOW);
        digitalWrite(IN2, LOW);
        digitalWrite(IN3, LOW);
        digitalWrite(IN4, LOW);
    }
}</code></pre>
        </div>
    </section>

    <section class="project-info mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li>
                <code>sIzq</code> y <code>sDer</code> guardan los pines
                de los sensores izquierdo y derecho.
            </li>
            <li>
                <code>IN1</code>, <code>IN2</code>, <code>IN3</code> e
                <code>IN4</code> indican los pines que controlan el driver
                de los motores.
            </li>
            <li>
                <code>pinMode()</code> configura los sensores como entradas
                y los pines del driver como salidas.
            </li>
            <li>
                <code>digitalRead()</code> lee la señal de cada sensor.
            </li>
            <li>
                El primer <code>if</code> ordena avanzar cuando ambos
                sensores leen <code>LOW</code>.
            </li>
            <li>
                El primer <code>else if</code> detiene un motor y mantiene
                el otro avanzando para realizar un giro.
            </li>
            <li>
                El segundo <code>else if</code> hace el movimiento contrario
                para girar hacia el otro lado.
            </li>
            <li>
                El <code>else</code> pone las cuatro señales del driver
                en <code>LOW</code> para detener los motores.
            </li>
        </ul>

        <p>
            <strong>Atención:</strong> el programa supone que ambos sensores
            entregan <code>LOW</code> al detectar la condición que permite
            avanzar. Algunos módulos detectan la línea negra con
            <code>LOW</code> y otros con <code>HIGH</code>. Comprobá las
            lecturas reales antes de probar el recorrido, porque puede ser
            necesario invertir las condiciones.
        </p>
    </section>

    <section class="steps-section mt-5">
        <h2 class="mb-4">Paso a paso</h2>

        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>1. Armá el robot</h4>
                    <p>
                        Montá los motores en el chasis, colocá la rueda loca
                        y fijá los sensores en la parte delantera, cerca del
                        suelo y a una altura adecuada para el módulo.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>2. Conectá y programá</h4>
                    <p>
                        Conectá los sensores y el driver según el esquema.
                        Revisá la alimentación y cargá el programa desde
                        el IDE de Arduino.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>3. Probá el recorrido</h4>
                    <p>
                        Colocá el robot sobre una pista clara con una línea
                        negra. Observá cómo responde y ajustá los sensores
                        o las condiciones si no sigue la trayectoria.
                    </p>
                </div>
            </div>
        </div>

        <div class="result-card mt-4">
            <h4>Resultado esperado</h4>
            <p class="mb-0">
                El robot lee los dos sensores continuamente y utiliza esas
                señales para avanzar, girar o detenerse, con el objetivo
                de seguir la línea marcada en el suelo.
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
