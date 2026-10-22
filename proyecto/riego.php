

<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a crear un sistema de riego automático con Arduino y un sensor de humedad del suelo.">
    <title>Sistema de Riego Automático - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel intermedio">Intermedio</span>
        <h1 class="section-title mb-2">Sistema de Riego Automático</h1>
        <p class="section-subtitle">
            Cuidá tus plantas con Arduino: detectá la humedad de la tierra
            y activá el riego cuando sea necesario.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿De qué trata este proyecto?</h2>
                <p>
                    Este proyecto permite controlar el riego de una planta
                    mediante un sensor de humedad del suelo. El sensor envía
                    una lectura al Arduino, que compara ese valor con un
                    umbral establecido en el programa.
                </p>
                <p>
                    Cuando la tierra está seca, el Arduino activa un módulo
                    relé que permite encender una bomba de agua. Cuando la
                    humedad alcanza el nivel establecido, el programa apaga
                    la bomba.
                </p>

                <h3>Materiales</h3>
                <ul>
                    <li>Arduino UNO.</li>
                    <li>Sensor de humedad de suelo YL-69 o FC-28.</li>
                    <li>Módulo relé de un canal compatible con la señal de control.</li>
                    <li>Mini bomba de agua sumergible de 5 V a 12 V.</li>
                    <li>Fuente de alimentación adecuada para la bomba.</li>
                    <li>Protoboard y cables de conexión.</li>
                    <li>Recipiente con agua y una maceta con tierra para la prueba.</li>
                </ul>

                <h3>¿Qué vas a aprender?</h3>
                <ul>
                    <li>Leer un sensor analógico con Arduino.</li>
                    <li>Utilizar una condición <code>if/else</code>.</li>
                    <li>Controlar un relé desde una salida digital.</li>
                    <li>Mostrar las mediciones en el Monitor Serie.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100">
                <div class="card-image">
                    <img
                        src="<?= BASE_URL ?>assets/img/sistemaDeRiego.jpg"
                        alt="Componentes del proyecto de sistema de riego automático"
                        class="img-fluid"
                    >
                </div>
            </div>
        </div>
    </div>

    <section class="project-info mt-5">
        <h2>Conexiones</h2>

        <h3>Sensor de humedad</h3>
        <ul>
            <li><strong>VCC:</strong> a 5V del Arduino, si el módulo lo admite.</li>
            <li><strong>GND:</strong> a GND del Arduino.</li>
            <li><strong>AO:</strong> a la entrada analógica A0 del Arduino.</li>
        </ul>

        <h3>Módulo relé</h3>
        <ul>
            <li><strong>VCC:</strong> a la alimentación compatible del módulo.</li>
            <li><strong>GND:</strong> a GND del Arduino.</li>
            <li><strong>IN:</strong> al pin digital 7 del Arduino.</li>
        </ul>

        <h3>Bomba de agua</h3>
        <p>
            La bomba debe utilizar una fuente de alimentación adecuada para
            su voltaje y consumo. El relé se conecta siguiendo el esquema
            del fabricante para controlar esa alimentación.
        </p>
        <p>
            <strong>Importante:</strong> no conectes la bomba directamente a
            un pin del Arduino ni alimentes la bomba desde el pin de 5V.
            Para practicar, utilizá una bomba de baja tensión y pedí ayuda
            a una persona con conocimientos de electricidad para revisar
            el circuito del relé antes de encenderlo.
        </p>
    </section>

    <section class="code-section mt-5">
        <h2>Código Arduino</h2>
        <p>
            Copiá este programa en el IDE de Arduino y seleccioná la placa
            y el puerto correctos antes de cargarlo.
        </p>

        <div class="card code-card">
<pre><code>const int sensorPin = A0;
const int relePin = 7;
int umbralHumedad = 500; // Ajustar según el tipo de suelo

void setup() {
  pinMode(relePin, OUTPUT);
  digitalWrite(relePin, HIGH); // Mantiene la bomba apagada al inicio
  Serial.begin(9600);
}

void loop() {
  int valorSensor = analogRead(sensorPin);
  Serial.print("Valor de humedad: ");
  Serial.println(valorSensor);

  if (valorSensor > umbralHumedad) {
    // Tierra seca: activa el relé (bomba encendida)
    digitalWrite(relePin, LOW);
  } else {
    // Tierra húmeda: desactiva el relé (bomba apagada)
    digitalWrite(relePin, HIGH);
  }

  delay(2000);
}</code></pre>
        </div>
    </section>

    <section class="project-info mt-5">
        <h2>¿Cómo funciona el código?</h2>

        <ul>
            <li>
                <code>sensorPin = A0</code>: indica que el sensor se lee
                desde la entrada analógica A0.
            </li>
            <li>
                <code>relePin = 7</code>: establece que el relé se controla
                desde el pin digital 7.
            </li>
            <li>
                <code>umbralHumedad = 500</code>: define el valor de
                referencia para decidir cuándo activar el riego.
            </li>
            <li>
                <code>pinMode(relePin, OUTPUT)</code>: configura el pin
                del relé como salida.
            </li>
            <li>
                <code>Serial.begin(9600)</code>: permite ver las mediciones
                en el Monitor Serie.
            </li>
            <li>
                <code>analogRead(sensorPin)</code>: lee el valor que envía
                el sensor. En un Arduino UNO normalmente va de 0 a 1023.
            </li>
            <li>
                <code>if (valorSensor &gt; umbralHumedad)</code>: si la
                lectura supera 500, el programa interpreta que la tierra
                está seca y activa el relé.
            </li>
            <li>
                <code>else</code>: si la lectura no supera el umbral,
                desactiva el relé.
            </li>
            <li>
                <code>delay(2000)</code>: espera dos segundos antes de
                realizar la siguiente medición.
            </li>
        </ul>

        <p>
            <strong>Tené en cuenta:</strong> el valor 500 es orientativo.
            La lectura cambia según el sensor y la tierra utilizada.
            Observá los valores en el Monitor Serie y ajustá el umbral
            mediante pruebas. En este programa, un valor mayor se interpreta
            como tierra más seca.
        </p>
    </section>

    <section class="steps-section mt-5">
        <h2 class="mb-4">Paso a paso</h2>

        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>1. Armá el circuito</h4>
                    <p>
                        Conectá el sensor a A0 y el módulo relé al pin
                        digital 7. Revisá las conexiones antes de alimentar
                        el circuito.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>2. Cargá el programa</h4>
                    <p>
                        Abrí el IDE de Arduino, copiá el código, elegí la
                        placa y el puerto, y cargá el programa.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>3. Probá el sensor</h4>
                    <p>
                        Abrí el Monitor Serie a 9600 baudios y observá cómo
                        cambian las lecturas al probar el sensor en tierra
                        con diferentes niveles de humedad.
                    </p>
                </div>
            </div>
        </div>

        <div class="result-card mt-4">
            <h4>Resultado esperado</h4>
            <p class="mb-0">
                El Arduino mide la humedad cada dos segundos. Si la lectura
                supera el umbral, activa el relé para encender la bomba;
                si no lo supera, la apaga. El resultado depende de la
                calibración del sensor y del tipo de relé utilizado.
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
