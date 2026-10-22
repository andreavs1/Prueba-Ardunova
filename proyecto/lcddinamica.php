<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pantalla LCD Dinámica - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/includes/header.php'; ?>

<main class="container py-5">

    <!-- Título del proyecto -->
    <section class="text-center mb-5">
        <h1 class="display-5 fw-bold">Pantalla LCD Dinámica</h1>

        <p class="lead">
            Aprendé a conectar y programar una pantalla LCD con Arduino
            para mostrar mensajes y datos que cambian en tiempo real.
        </p>

        <img
            src="<?= BASE_URL ?>assets/img/lcd-dinamica.jpg"
            class="img-fluid rounded shadow mt-3"
            alt="Pantalla LCD conectada a Arduino"
            style="max-height: 350px;"
        >
    </section>

    <!-- Introducción -->
    <section class="mb-5">
        <h2>¿De qué trata este proyecto?</h2>

        <p>
            En este proyecto vamos a utilizar una pantalla LCD de 16
            columnas y 2 filas para mostrar información mediante Arduino.
            La pantalla puede mostrar mensajes y valores que se actualizan
            automáticamente, como un contador de segundos.
        </p>

        <p>
            Utilizaremos una pantalla LCD con módulo I2C, que permite
            conectarla a Arduino usando solamente cuatro conexiones.
        </p>
    </section>

    <!-- Imagen del armado -->
    <section class="text-center mb-5">
        <h2>Materiales y armado</h2>

        <img
            src="<?= BASE_URL ?>assets/img/lcddinamica1.png"
            class="img-fluid rounded shadow my-3"
            alt="Armado del proyecto de pantalla LCD dinámica"
            style="max-height: 400px;"
        >
    </section>

    <!-- Componentes -->
    <section class="mb-5">
        <h2>Componentes necesarios</h2>

        <ul>
            <li>1 placa Arduino UNO.</li>
            <li>1 pantalla LCD de 16x2 con módulo I2C.</li>
            <li>Cables Dupont macho-macho.</li>
            <li>1 protoboard (opcional, según el armado).</li>
            <li>1 cable USB para conectar Arduino a la computadora.</li>
        </ul>
    </section>

    <!-- Conexiones -->
    <section class="mb-5">
        <h2>Conexiones de los componentes</h2>

        <p>Conectá la pantalla LCD I2C a la placa Arduino UNO de la siguiente manera:</p>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Pin de la pantalla LCD</th>
                        <th>Pin de Arduino UNO</th>
                        <th>Función</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>VCC</td>
                        <td>5V</td>
                        <td>Alimentación</td>
                    </tr>

                    <tr>
                        <td>GND</td>
                        <td>GND</td>
                        <td>Tierra</td>
                    </tr>

                    <tr>
                        <td>SDA</td>
                        <td>A4</td>
                        <td>Comunicación de datos</td>
                    </tr>

                    <tr>
                        <td>SCL</td>
                        <td>A5</td>
                        <td>Reloj de comunicación I2C</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="text-muted">
            Importante: estas conexiones corresponden al Arduino UNO clásico.
            Verificá que tu pantalla tenga módulo I2C.
        </p>
    </section>

    <!-- Paso a paso -->
    <section class="mb-5">
        <h2>Armado paso a paso</h2>

        <div class="mb-4">
            <h3>1. Preparar los materiales</h3>
            <p>
                Reuní la placa Arduino UNO, la pantalla LCD I2C y los cables.
                Antes de conectar los componentes, asegurate de que Arduino
                no esté alimentado.
            </p>
        </div>

        <div class="mb-4">
            <h3>2. Conectar la pantalla</h3>
            <p>
                Conectá VCC a 5V, GND a GND, SDA a A4 y SCL a A5.
                Revisá las conexiones antes de continuar.
            </p>
        </div>

        <div class="mb-4">
            <h3>3. Preparar el programa</h3>
            <p>
                Abrí Arduino IDE e instalá una biblioteca compatible con
                pantallas LCD I2C, como LiquidCrystal_I2C.
            </p>
        </div>

        <div class="mb-4">
            <h3>4. Cargar y probar</h3>
            <p>
                Copiá el código de ejemplo, seleccioná la placa y el puerto
                correspondiente y cargá el programa. Si la pantalla no muestra
                texto, revisá las conexiones, el contraste y la dirección I2C.
            </p>
        </div>
    </section>

    <!-- Código Arduino -->
    <section class="mb-5">
        <h2>Código Arduino</h2>

        <p>
            Este programa muestra un mensaje inicial y después actualiza
            un contador que indica cuántos segundos pasaron desde que
            comenzó a ejecutarse.
        </p>

        <div class="bg-dark text-light p-3 rounded">
            <pre class="mb-0 text-light"><code>#include &lt;Wire.h&gt;
#include &lt;LiquidCrystal_I2C.h&gt;

// Dirección I2C y tamaño de la pantalla
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
    lcd.init();
    lcd.backlight();

    lcd.setCursor(0, 0);
    lcd.print("LCD Dinamica v1");

    lcd.setCursor(0, 1);
    lcd.print("Iniciando...");
    delay(2000);

    lcd.clear();
}

void loop() {
    lcd.setCursor(0, 0);
    lcd.print("LCD Dinamica");

    lcd.setCursor(0, 1);
    lcd.print("Contador: ");
    lcd.print(millis() / 1000);
    lcd.print(" s   ");

    delay(1000);
}</code></pre>
        </div>
    </section>

    <!-- Explicación del código -->
    <section class="mb-5">
        <h2>¿Cómo funciona el código?</h2>

        <ul>
            <li><strong>Wire.h:</strong> permite la comunicación I2C.</li>
            <li><strong>LiquidCrystal_I2C.h:</strong> permite controlar la pantalla.</li>
            <li><strong>lcd.init():</strong> inicializa la pantalla LCD.</li>
            <li><strong>lcd.backlight():</strong> enciende la luz de fondo.</li>
            <li><strong>lcd.setCursor():</strong> indica dónde se escribe el texto.</li>
            <li><strong>lcd.print():</strong> muestra mensajes y valores.</li>
            <li><strong>millis():</strong> devuelve el tiempo transcurrido desde que empezó el programa.</li>
            <li><strong>delay(1000):</strong> espera un segundo antes de repetir el ciclo.</li>
        </ul>

        <p>
            El contador se actualiza aproximadamente cada segundo. Los espacios
            al final de la segunda línea ayudan a borrar caracteres que puedan
            haber quedado de un número anterior.
        </p>
    </section>

    <!-- Resultado esperado -->
    <section class="mb-5">
        <h2>Resultado esperado</h2>

        <p>
            Al iniciar, la pantalla mostrará el mensaje
            <strong>“LCD Dinamica v1”</strong>. Después aparecerá el texto
            “LCD Dinamica” y, en la segunda fila, un contador que aumentará
            cada segundo.
        </p>
    </section>

    <!-- Simulador -->
    <section class="mb-5">
        <h2>Probá el proyecto en Wokwi</h2>

        <p>
            Podés simular el circuito antes de armarlo físicamente.
            Para mostrar tu proyecto, reemplazá el identificador de ejemplo
            por el ID real de tu simulación de Wokwi.
        </p>

        <div class="ratio ratio-16x9">
            <iframe
                src="https://wokwi.com/projects/ID_DE_TU_PROYECTO_WOKWI"
                title="Simulador de pantalla LCD dinámica"
                allowfullscreen
                loading="lazy">
            </iframe>
        </div>

        <p class="text-muted mt-2">
            El simulador no funcionará hasta que coloques un ID válido.
        </p>
    </section>

    <!-- Volver a proyectos -->
    <section class="text-center mt-5">
        <a href="proyectos.php" class="btn btn-gradient">
            Volver a proyectos
        </a>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>