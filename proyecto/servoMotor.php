<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Control de un servomotor mediante Arduino.">
    <title>Servomotor con Arduino - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container">

    <div class="project-header">
        <span class="tag-nivel intermedio">Intermedio</span>

        <h1 class="section-title mb-2">
            ⚙️ Servomotor con Arduino
        </h1>

        <p class="section-subtitle">
            Controlá la posición de un servomotor utilizando Arduino.
        </p>
    </div>

    <div class="row g-4">

        <!-- INFORMACIÓN -->
        <div class="col-12 col-lg-7">

            <div class="project-info">

                <h2>Explicación</h2>

                <p>
                    En este proyecto vamos a controlar un servomotor utilizando
                    una placa Arduino UNO. El servomotor permite mover su eje
                    hasta una posición determinada, generalmente entre 0° y 180°.
                </p>

                <p>
                    Este proyecto es útil para aprender a controlar movimientos
                    mecánicos mediante programación y comprender cómo Arduino
                    puede enviar señales a distintos componentes electrónicos.
                </p>

                <h3>Objetivo</h3>

                <p>
                    Aprender a conectar un servomotor a Arduino y programarlo
                    para que se mueva entre diferentes posiciones.
                </p>

                <h3>Materiales</h3>

                <ul>
                    <li>Arduino UNO</li>
                    <li>1 Servomotor SG90</li>
                    <li>Protoboard</li>
                    <li>Cables Jumper</li>
                    <li>Cable USB</li>
                </ul>

            </div>

        </div>

        <!-- IMÁGENES -->
        <div class="col-12 col-lg-5">

            <div class="card h-100 border-0 shadow-sm">

                <div class="card-image">

                    <img
                        src="../assets/img/ServoMotor.jpg"
                        alt="Servomotor con Arduino">

                    <img
                        src="../assets/img/servoMotor1.jpg"
                        alt="Proyecto servomotor con Arduino">

                </div>

            </div>

        </div>

    </div>

    <!-- CONEXIONES -->
    <section class="steps-section mt-5">

        <h2 class="mb-4">
            🔌 Esquema de conexión
        </h2>

        <div class="card my-3">

            <div class="card-body">

                <ul>

                    <li>
                        <strong>Cable rojo:</strong>
                        conectar al pin 5V de Arduino.
                    </li>

                    <li>
                        <strong>Cable marrón o negro:</strong>
                        conectar al pin GND de Arduino.
                    </li>

                    <li>
                        <strong>Cable naranja o amarillo:</strong>
                        conectar al pin digital 9 de Arduino.
                    </li>

                </ul>

            </div>

        </div>

    </section>

    <!-- PASO A PASO -->
    <section class="steps-section mt-5">

        <h2 class="mb-4">
            🛠️ Paso a paso
        </h2>

        <div class="row g-3">

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>1. Conexiones</h4>

                    <p>
                        Conectá el cable de alimentación del servomotor
                        al pin 5V, el cable de tierra a GND y el cable
                        de señal al pin digital 9.
                    </p>

                </div>

            </div>

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>2. Programar</h4>

                    <p>
                        Abrí Arduino IDE, copiá el código del proyecto
                        y seleccioná la placa Arduino UNO correspondiente.
                    </p>

                </div>

            </div>

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>3. Probar</h4>

                    <p>
                        Cargá el programa en Arduino y observá cómo el
                        servomotor cambia de posición automáticamente.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- CÓDIGO -->
    <section class="code-section mt-5">

        <h2>
            💻 Código Fuente
        </h2>

        <div class="card code-card">

            <pre><code>#include &lt;Servo.h&gt;

Servo miServo;

void setup() {
    miServo.attach(9);
}

void loop() {

    miServo.write(0);
    delay(1000);

    miServo.write(90);
    delay(1000);

    miServo.write(180);
    delay(1000);

    miServo.write(90);
    delay(1000);
}</code></pre>

        </div>

    </section>

    <!-- RESULTADO -->
    <div class="result-card mt-5">

        <h4>✅ Resultado esperado</h4>

        <p class="mb-0">
            El servomotor deberá moverse desde 0° hasta 180°,
            pasando por 90°, y luego regresar. El movimiento se
            repetirá continuamente.
        </p>

    </div>

    <!-- VOLVER -->
    <div class="text-center button-container my-4">

        <a href="proyectos.php" class="btn btn-outline-cyan">
            ← Volver a Proyectos
        </a>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>

