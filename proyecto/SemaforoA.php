
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a programar un semáforo vehicular y peatonal con Arduino y un pulsador.">
    <title>Semáforo Avanzado con Paso Peatonal - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <span class="tag-nivel intermedio">Intermedio</span>

    <h1 class="section-title">Semáforo Avanzado con Paso Peatonal</h1>

    <p>
        En este proyecto vamos a construir un sistema de semáforos con
        Arduino que controla el paso de los vehículos y los peatones.
        Un pulsador permite solicitar el cruce peatonal y activa una
        secuencia de luces con diferentes tiempos de espera.
    </p>

    <h2>¿Qué vamos a aprender?</h2>

    <p>
        Vamos a aprender a controlar varios LEDs mediante salidas
        digitales, leer el estado de un pulsador y utilizar la función
        delay() para establecer tiempos entre los cambios de luces.
        También vamos a comprender cómo organizar una secuencia de
        estados para coordinar el tránsito vehicular y peatonal.
    </p>

    <div class="text-center my-4">
        <img
            src="<?= BASE_URL ?>assets/img/semaforoA(1).jpg"
            alt="Semáforo avanzado con Arduino y paso peatonal"
            class="img-fluid rounded"
            style="max-width: 600px;"
        >
    </div>

    <h2>Lista de componentes</h2>

    <ul>
        <li>Una placa Arduino UNO.</li>
        <li>Dos LEDs rojos.</li>
        <li>Un LED amarillo.</li>
        <li>Dos LEDs verdes.</li>
        <li>Cinco resistencias de 220 ohmios para los LEDs.</li>
        <li>Un pulsador.</li>
        <li>Una resistencia de 10 kiloohmios para el pulsador.</li>
        <li>Una protoboard.</li>
        <li>Cables jumper.</li>
        <li>Un cable USB para conectar Arduino a la computadora.</li>
    </ul>

    <h2>Conexión de los cables</h2>

    <p>
        Conectá los componentes respetando los pines utilizados en
        el programa.
    </p>

    <h3>Semáforo vehicular</h3>

    <ul>
        <li><strong>LED verde:</strong> pin digital 10.</li>
        <li><strong>LED amarillo:</strong> pin digital 9.</li>
        <li><strong>LED rojo:</strong> pin digital 8.</li>
    </ul>

    <h3>Semáforo peatonal</h3>

    <ul>
        <li><strong>LED verde:</strong> pin digital 6.</li>
        <li><strong>LED rojo:</strong> pin digital 7.</li>
    </ul>

    <h3>Pulsador peatonal</h3>

    <ul>
        <li>Conectá el pulsador para que Arduino pueda leer su estado desde el pin digital 2.</li>
        <li>Utilizá una resistencia pull-down de 10 kiloohmios entre el pin 2 y GND.</li>
        <li>Conectá el otro lado del pulsador a 5 V, de manera que al presionarlo el pin 2 lea HIGH.</li>
    </ul>

    <p>
        Cada LED debe tener su propia resistencia limitadora de corriente.
        Conectá los cátodos a GND y verificá la polaridad de los LEDs.
        Revisá todas las conexiones antes de alimentar el circuito.
    </p>

    <h2>Procedimiento paso a paso</h2>

    <ol>
        <li>Prepará Arduino UNO, los cinco LEDs, las resistencias, el pulsador y los cables.</li>
        <li>Armá los dos grupos de luces: el semáforo vehicular y el peatonal.</li>
        <li>Conectá cada LED al pin indicado en la sección anterior, utilizando una resistencia.</li>
        <li>Conectá el pulsador al pin 2 y agregá la resistencia pull-down de 10 kiloohmios.</li>
        <li>Conectá Arduino a la computadora mediante el cable USB.</li>
        <li>Abrí el IDE de Arduino y copiá el código del proyecto.</li>
        <li>Seleccioná la placa Arduino UNO y el puerto correcto.</li>
        <li>Verificá el programa y cargalo en la placa.</li>
        <li>Observá la secuencia de luces y presioná el botón para solicitar el paso peatonal.</li>
    </ol>

    <h2>Código de Arduino</h2>

    <p>
        El programa configura los pines de los LEDs como salidas y el
        pin del pulsador como entrada. Mientras el botón no se presione,
        mantiene habilitada la luz verde vehicular y la luz roja peatonal.
        Cuando detecta una pulsación, ejecuta la secuencia de cambio de luces.
    </p>

    <pre class="p-3 rounded" style="background-color: #f1f1f1; color: #222; white-space: pre-wrap;"><code>const int vVehiculo = 10, aVehiculo = 9, rVehiculo = 8;
const int vPeaton = 6, rPeaton = 7;
const int boton = 2;

void setup() {
    pinMode(vVehiculo, OUTPUT); pinMode(aVehiculo, OUTPUT); pinMode(rVehiculo, OUTPUT);
    pinMode(vPeaton, OUTPUT); pinMode(rPeaton, OUTPUT);
    pinMode(boton, INPUT);
}

void loop() {
    digitalWrite(vVehiculo, HIGH);
    digitalWrite(rPeaton, HIGH);

    if (digitalRead(boton) == HIGH) {
        delay(1000);
        digitalWrite(vVehiculo, LOW);
        digitalWrite(aVehiculo, HIGH);
        delay(2000);
        digitalWrite(aVehiculo, LOW);
        digitalWrite(rVehiculo, HIGH);

        digitalWrite(rPeaton, LOW);
        digitalWrite(vPeaton, HIGH);
        delay(5000);

        digitalWrite(vPeaton, LOW);
        digitalWrite(rPeaton, HIGH);
        digitalWrite(rVehiculo, LOW);
    }
}</code></pre>

    <h2>¿Cómo funciona el código?</h2>

    <ul>
        <li>
            <code>const int</code> define constantes con los números
            de los pines utilizados para cada LED y el pulsador.
        </li>
        <li>
            <code>void setup()</code> contiene las instrucciones que
            se ejecutan una sola vez al iniciar Arduino.
        </li>
        <li>
            <code>pinMode(..., OUTPUT)</code> configura los pines de
            los LEDs como salidas para poder encenderlos y apagarlos.
        </li>
        <li>
            <code>pinMode(boton, INPUT)</code> configura el pin 2 como
            entrada para leer el estado del pulsador.
        </li>
        <li>
            <code>void loop()</code> repite continuamente las instrucciones
            principales del programa.
        </li>
        <li>
            <code>digitalWrite(vVehiculo, HIGH)</code> enciende la luz
            verde vehicular.
        </li>
        <li>
            <code>digitalWrite(rPeaton, HIGH)</code> enciende la luz
            roja peatonal.
        </li>
        <li>
            <code>digitalRead(boton)</code> permite comprobar si el
            pulsador está presionado. Con la conexión indicada, la
            lectura será HIGH mientras se presione.
        </li>
        <li>
            <code>if (digitalRead(boton) == HIGH)</code> ejecuta la
            secuencia de cruce únicamente cuando detecta el botón
            en estado HIGH.
        </li>
        <li>
            <code>delay(1000)</code> espera un segundo antes de cambiar
            la luz vehicular.
        </li>
        <li>
            <code>digitalWrite(aVehiculo, HIGH)</code> enciende la luz
            amarilla vehicular, que permanece así durante dos segundos.
        </li>
        <li>
            <code>digitalWrite(rVehiculo, HIGH)</code> enciende la luz
            roja vehicular antes de habilitar el paso peatonal.
        </li>
        <li>
            <code>digitalWrite(rPeaton, LOW)</code> apaga la luz roja
            peatonal, mientras que <code>digitalWrite(vPeaton, HIGH)</code>
            enciende la verde peatonal durante cinco segundos.
        </li>
        <li>
            Al terminar, el programa apaga la luz verde peatonal,
            vuelve a encender la roja peatonal y apaga la roja vehicular.
            Luego el ciclo vuelve a comenzar.
        </li>
    </ul>

    <h2>Resultado esperado</h2>

    <p>
        Al iniciar el programa, la luz verde vehicular y la roja peatonal
        estarán encendidas. Cuando se presione el pulsador, el sistema
        esperará un segundo, encenderá la luz amarilla vehicular durante
        dos segundos y después habilitará el paso peatonal durante
        cinco segundos.
    </p>

    <p>
        Al finalizar, el semáforo peatonal volverá a rojo y el programa
        regresará al estado inicial.
    </p>

    <p>
        <strong>Importante:</strong> este código es una demostración
        educativa. Como utiliza delay() y no comprueba si hay nuevas
        pulsaciones durante las esperas, no debe utilizarse para controlar
        el tránsito real. Antes de probarlo, verificá que las luces
        iniciales y las conexiones sean correctas.
    </p>

    <div class="text-center button-container my-4">
        <a
            href="<?= BASE_URL ?>proyecto/proyectos.php"
            class="btn btn-outline-cyan"
        >
            ← Volver a Proyectos
        </a>
    </div>

</main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
