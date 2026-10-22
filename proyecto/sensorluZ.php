
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a crear una luz nocturna automática con Arduino, un sensor LDR y un LED.">
    <title>Sensor de Luz (LDR) - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title mb-2">Sensor de Luz (LDR)</h1>
        <p class="section-subtitle">
            Creá una luz nocturna automática que detecta la oscuridad
            y enciende un LED cuando hay poca iluminación.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿De qué trata este proyecto?</h2>
                <p>
                    Este proyecto utiliza un LDR, un componente cuya
                    resistencia eléctrica cambia según la cantidad de luz
                    que recibe. Arduino lee esa variación y decide cuándo
                    encender o apagar un LED.
                </p>
                <p>
                    Cuando la lectura del sensor está por debajo del umbral
                    establecido, el programa interpreta que hay poca luz
                    y enciende el LED. Cuando la iluminación es suficiente,
                    lo apaga.
                </p>

                <h3>Objetivo</h3>
                <p>
                    Aprender a leer una entrada analógica, utilizar una
                    condición y controlar una salida digital.
                </p>

                <h3>Materiales</h3>
                <ul>
                    <li>Arduino UNO.</li>
                    <li>Sensor de luz LDR.</li>
                    <li>LED.</li>
                    <li>Resistencia de 10 kΩ.</li>
                    <li>Resistencia de 220 Ω para el LED.</li>
                    <li>Protoboard y cables de conexión.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100">
                <div class="card-image">
                    <img
                        src="../assets/img/sensorDeLuz.jpg"
                        alt="Componentes del proyecto sensor de luz con Arduino"
                        class="img-fluid"
                    >
                </div>
            </div>
        </div>
    </div>

    <section class="project-info mt-5">
        <h2>Conexiones</h2>

        <h3>1. Sensor LDR</h3>
        <ul>
            <li>Un terminal del LDR: a 5V del Arduino.</li>
            <li>El otro terminal del LDR: al punto de conexión con A0.</li>
            <li>Resistencia de 10 kΩ: entre ese mismo punto de A0 y GND.</li>
        </ul>

        <p>
            La resistencia de 10 kΩ y el LDR forman un divisor de tensión.
            Esto permite que Arduino reciba una lectura que cambia según
            la luz del ambiente.
        </p>

        <h3>2. LED</h3>
        <ul>
            <li>Pin 13 del Arduino: conectado a una resistencia de 220 Ω.</li>
            <li>La resistencia: conectada al ánodo del LED, su pata larga.</li>
            <li>Cátodo del LED, su pata corta: a GND.</li>
        </ul>

        <p>
            También podés utilizar el LED integrado de la placa Arduino UNO,
            que normalmente está asociado al pin 13. Si usás un LED externo,
            colocá siempre su resistencia en serie.
        </p>
    </section>

    <section class="code-section mt-5">
        <h2>Código Arduino</h2>
        <p>
            Copiá el programa en el IDE de Arduino y seleccioná la placa
            y el puerto correctos antes de cargarlo.
        </p>

        <div class="card code-card">
<pre><code>const int ldrPin = A0;   // Pin donde conectamos el sensor de luz
const int ledPin = 13;   // Pin donde conectamos el LED

int umbralLuz = 500;     // Nivel de oscuridad para encender el LED

void setup() {
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600);    // Permite monitorizar los valores en tiempo real
}

void loop() {
  int valorLuz = analogRead(ldrPin);

  Serial.print("Nivel de luz medido: ");
  Serial.println(valorLuz);

  if (valorLuz &lt; umbralLuz) {
    digitalWrite(ledPin, HIGH); // Hay oscuridad: enciende el LED
  } else {
    digitalWrite(ledPin, LOW);  // Hay luz suficiente: apaga el LED
  }

  delay(500);
}</code></pre>
        </div>
    </section>

    <section class="project-info mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li>
                <code>ldrPin = A0</code>: indica que el sensor está
                conectado a la entrada analógica A0.
            </li>
            <li>
                <code>ledPin = 13</code>: indica el pin que controla
                el LED.
            </li>
            <li>
                <code>umbralLuz = 500</code>: establece el valor de
                referencia para decidir cuándo encender la luz.
            </li>
            <li>
                <code>pinMode(ledPin, OUTPUT)</code>: configura el pin
                del LED como salida.
            </li>
            <li>
                <code>Serial.begin(9600)</code>: permite enviar información
                al Monitor Serie.
            </li>
            <li>
                <code>analogRead(ldrPin)</code>: obtiene una lectura
                analógica del sensor. En un Arduino UNO, normalmente
                el valor va de 0 a 1023.
            </li>
            <li>
                <code>Serial.println(valorLuz)</code>: muestra el valor
                medido para que puedas observar cómo cambia con la luz.
            </li>
            <li>
                <code>if (valorLuz &lt; umbralLuz)</code>: si la lectura
                es menor que 500, enciende el LED.
            </li>
            <li>
                <code>else</code>: si la lectura es igual o mayor que 500,
                apaga el LED.
            </li>
            <li>
                <code>delay(500)</code>: espera medio segundo antes de
                realizar otra lectura.
            </li>
        </ul>

        <p>
            <strong>Importante:</strong> el valor 500 es orientativo.
            Podés cambiarlo según las lecturas de tu sensor y la iluminación
            del lugar. Con las conexiones indicadas, normalmente la lectura
            disminuye cuando hay menos luz; si tu montaje se comporta al
            revés, revisá el circuito y las mediciones antes de cambiar
            la condición.
        </p>
    </section>

    <section class="steps-section mt-5">
        <h2 class="mb-4">Paso a paso</h2>

        <div class="row g-3">
            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>1. Armá el circuito</h4>
                    <p>
                        Conectá el LDR con la resistencia de 10 kΩ formando
                        un divisor de tensión y conectá el LED al pin 13
                        mediante su resistencia.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>2. Cargá el programa</h4>
                    <p>
                        Abrí el IDE de Arduino, copiá el código y cargalo
                        en la placa. Después abrí el Monitor Serie
                        a 9600 baudios.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="setup-step p-4 h-100">
                    <h4>3. Probá el sensor</h4>
                    <p>
                        Observá las lecturas con distinta iluminación.
                        Tapá el LDR con la mano y comprobá si el LED
                        se enciende cuando el valor baja del umbral.
                    </p>
                </div>
            </div>
        </div>

        <div class="result-card mt-4">
            <h4>Resultado esperado</h4>
            <p class="mb-0">
                El Arduino mide la iluminación continuamente. Si la lectura
                es menor que el umbral configurado, enciende el LED; si
                es igual o mayor, lo apaga.
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
