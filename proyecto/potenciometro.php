
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a leer un potenciómetro con Arduino y controlar la velocidad de parpadeo de un LED.">
    <title>Lectura de Potenciómetro - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title mb-2">Lectura de Potenciómetro</h1>
        <p class="section-subtitle">
            Aprendé a leer señales analógicas y variar la velocidad de parpadeo de un LED.
        </p>
    </div>

    <div class="row g-4 align-items-stretch">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿Qué vamos a aprender?</h2>
                <p>
                    En este proyecto vamos a utilizar un potenciómetro para
                    modificar el tiempo de encendido y apagado de un LED.
                    Arduino leerá la posición de la perilla mediante una
                    entrada analógica.
                </p>

                <h3>Objetivo</h3>
                <p>
                    Comprender cómo funciona <code>analogRead()</code> y cómo
                    utilizar el valor obtenido para modificar el comportamiento
                    de una salida digital.
                </p>

                <h3>Lista de componentes</h3>
                <ul>
                    <li>Una placa Arduino UNO.</li>
                    <li>Un potenciómetro de 10 kΩ.</li>
                    <li>Un LED.</li>
                    <li>Una resistencia de 220 Ω para el LED.</li>
                    <li>Una protoboard y cables jumper.</li>
                    <li>Un cable USB para conectar Arduino a la computadora.</li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-image text-center p-3">
                    <img
                        src="<?= BASE_URL ?>assets/img/potenciometro.jpg"
                        alt="Componentes del proyecto de potenciómetro"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5">
        <h2>Conexión de los cables</h2>
        <ul>
            <li>
                <strong>Primera pata del potenciómetro:</strong> conectala a 5V.
            </li>
            <li>
                <strong>Pata central del potenciómetro:</strong> conectala a A0.
            </li>
            <li>
                <strong>Tercera pata del potenciómetro:</strong> conectala a GND.
            </li>
            <li>
                <strong>LED:</strong> conectá la pata larga al pin digital 13
                mediante una resistencia de 220 Ω.
            </li>
            <li>
                <strong>GND:</strong> conectá la pata corta del LED a GND.
            </li>
        </ul>
        <p>
            Verificá las conexiones antes de encender la placa. La resistencia
            limita la corriente que pasa por el LED.
        </p>
    </section>

    <section class="mt-5">
        <h2>Procedimiento paso a paso</h2>
        <ol>
            <li>Prepará la placa Arduino UNO, el potenciómetro y el LED.</li>
            <li>Conectá las patas del potenciómetro a 5V, A0 y GND.</li>
            <li>Conectá el LED al pin 13 mediante su resistencia.</li>
            <li>Abrí el IDE de Arduino en la computadora.</li>
            <li>Copiá el código que aparece a continuación.</li>
            <li>Seleccioná Arduino UNO y el puerto correspondiente.</li>
            <li>Cargá el programa en la placa.</li>
            <li>Abrí el Monitor Serie y seleccioná 9600 baudios.</li>
            <li>Gir á la perilla y observá los valores y el parpadeo del LED.</li>
        </ol>
    </section>

    <section class="code-section mt-5">
        <h2>Código de Arduino</h2>
        <p>
            El programa lee el potenciómetro y utiliza su valor para determinar
            cuánto tiempo permanece encendido y apagado el LED.
        </p>

        <pre class="codigo p-3 rounded"><code>const int potPin = A0;  // Pin donde conectamos el potenciómetro
const int ledPin = 13;  // Pin del LED

int valorPot = 0;       // Variable para guardar la lectura

void setup() {
    pinMode(ledPin, OUTPUT);
    Serial.begin(9600);
}

void loop() {
    valorPot = analogRead(potPin);

    Serial.print("Valor del potenciometro: ");
    Serial.println(valorPot);

    digitalWrite(ledPin, HIGH);
    delay(valorPot);

    digitalWrite(ledPin, LOW);
    delay(valorPot);
}</code></pre>
    </section>

    <section class="mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li>
                <code>const int potPin = A0;</code> indica que el potenciómetro
                está conectado a la entrada analógica A0.
            </li>
            <li>
                <code>const int ledPin = 13;</code> indica que el LED está
                conectado al pin digital 13.
            </li>
            <li>
                <code>int valorPot = 0;</code> crea una variable para guardar
                la lectura del potenciómetro.
            </li>
            <li>
                <code>pinMode(ledPin, OUTPUT);</code> configura el pin del LED
                como salida.
            </li>
            <li>
                <code>Serial.begin(9600);</code> inicia la comunicación con la
                computadora para mostrar los valores.
            </li>
            <li>
                <code>analogRead(potPin);</code> lee la señal analógica.
                En un Arduino UNO, normalmente devuelve un valor entre 0 y 1023.
            </li>
            <li>
                <code>Serial.print()</code> y <code>Serial.println()</code>
                muestran el valor leído en el Monitor Serie.
            </li>
            <li>
                <code>digitalWrite(ledPin, HIGH);</code> enciende el LED.
            </li>
            <li>
                <code>delay(valorPot);</code> espera una cantidad de
                milisegundos determinada por la lectura.
            </li>
            <li>
                <code>digitalWrite(ledPin, LOW);</code> apaga el LED.
            </li>
            <li>
                <code>loop()</code> repite todo el proceso continuamente.
            </li>
        </ul>
    </section>

    <section class="mt-5">
        <h2>Resultado esperado</h2>
        <p>
            Al girar la perilla, cambia el valor leído por Arduino y también
            cambia el tiempo de encendido y apagado del LED. Con valores bajos,
            el parpadeo es más rápido; con valores altos, es más lento.
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
