
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a controlar una pantalla LCD I2C con Arduino y mostrar un contador dinámico paso a paso.">
    <title>Pantalla LCD Dinámica - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <span class="tag-nivel intermedio">Intermedio</span>

    <h1 class="section-title">Pantalla LCD Dinámica</h1>

    <p>
        En este proyecto vamos a aprender a utilizar una pantalla LCD
        con comunicación I2C y Arduino. La pantalla mostrará un mensaje
        fijo en la primera línea y un contador de segundos en la segunda.
    </p>

    <h2>¿Qué vamos a aprender?</h2>

    <p>
        Vamos a conocer cómo conectar una pantalla LCD I2C, inicializarla
        desde Arduino, mostrar textos y actualizar información
        automáticamente. También aprenderemos a utilizar la función
        millis() para calcular el tiempo transcurrido desde que comenzó
        a ejecutarse el programa.
    </p>

    <div class="text-center my-4">
        <img
            src="<?= BASE_URL ?>assets/img/lcddinamica(1).jpg"
            alt="Pantalla LCD Dinámica utilizada en el proyecto"
            class="img-fluid rounded"
            style="max-width: 500px;"
        >
    </div>

    <h2>Lista de componentes</h2>

    <ul>
        <li>Una placa Arduino UNO.</li>
        <li>Una pantalla LCD de 16 columnas y 2 filas con adaptador I2C.</li>
        <li>Cables jumper.</li>
        <li>Una protoboard, si el montaje la requiere.</li>
        <li>Un cable USB para conectar Arduino a la computadora.</li>
    </ul>

    <p>
        También necesitás el IDE de Arduino y una biblioteca compatible
        con LiquidCrystal_I2C para controlar la pantalla.
    </p>

    <h2>Conexión de los cables</h2>

    <p>
        Para conectar una pantalla LCD I2C a una placa Arduino UNO,
        utilizá las siguientes conexiones habituales:
    </p>

    <ul>
        <li>
            <strong>VCC:</strong>
            conectalo a 5V, si corresponde a las especificaciones del módulo.
        </li>
        <li>
            <strong>GND:</strong>
            conectalo a GND de Arduino.
        </li>
        <li>
            <strong>SDA:</strong>
            conectalo al pin A4 de Arduino UNO.
        </li>
        <li>
            <strong>SCL:</strong>
            conectalo al pin A5 de Arduino UNO.
        </li>
    </ul>

    <p>
        Estas conexiones corresponden al Arduino UNO clásico.
        Si utilizás otra placa, los pines de comunicación I2C pueden
        ser diferentes. Verificá también la dirección I2C de tu pantalla.
    </p>

    <h2>Procedimiento paso a paso</h2>

    <ol>
        <li>Reuní la placa Arduino UNO, la pantalla LCD I2C y los cables.</li>
        <li>Conectá VCC, GND, SDA y SCL según las indicaciones anteriores.</li>
        <li>Conectá Arduino a la computadora mediante el cable USB.</li>
        <li>Abrí el IDE de Arduino.</li>
        <li>Instalá una biblioteca compatible con LiquidCrystal_I2C si todavía no la tenés.</li>
        <li>Copiá el código que aparece a continuación.</li>
        <li>Seleccioná Arduino UNO y el puerto correspondiente.</li>
        <li>Verificá el programa y cargalo en la placa.</li>
        <li>Observá el mensaje de la primera línea y el contador de la segunda.</li>
    </ol>

    <h2>Código de Arduino</h2>

    <p>
        Este programa inicializa la pantalla, muestra un título y
        actualiza un contador que indica los segundos aproximados
        transcurridos desde el inicio.
    </p>

    <pre class="p-3 rounded" style="background-color: #f1f1f1; color: #222; white-space: pre-wrap;"><code>#include &lt;Wire.h&gt;
#include &lt;LiquidCrystal_I2C.h&gt;

// Configura la dirección I2C y las dimensiones de la pantalla
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
    // Inicializar la pantalla LCD
    lcd.init();

    // Encender la luz de fondo
    lcd.backlight();

    // Mostrar un mensaje en la primera línea
    lcd.setCursor(0, 0);
    lcd.print("LCD Dinamica v1");
}

void loop() {
    // Ubicar el cursor en la segunda línea
    lcd.setCursor(0, 1);

    // Mostrar el contador de segundos
    lcd.print("Contador: ");
    lcd.print(millis() / 1000);
    lcd.print(" s   ");

    // Esperar un segundo
    delay(1000);
}</code></pre>

    <h2>¿Cómo funciona el código?</h2>

    <ul>
        <li>
            <code>#include &lt;Wire.h&gt;</code> incorpora la biblioteca
            que permite utilizar la comunicación I2C.
        </li>
        <li>
            <code>#include &lt;LiquidCrystal_I2C.h&gt;</code> permite
            controlar la pantalla LCD mediante el adaptador I2C.
        </li>
        <li>
            <code>LiquidCrystal_I2C lcd(0x27, 16, 2);</code> crea el
            objeto de la pantalla, configura la dirección I2C 0x27
            y establece sus 16 columnas y 2 filas.
        </li>
        <li>
            <code>void setup()</code> contiene las instrucciones que
            se ejecutan una sola vez al iniciar Arduino.
        </li>
        <li>
            <code>lcd.init();</code> inicializa la pantalla para utilizarla.
        </li>
        <li>
            <code>lcd.backlight();</code> enciende la luz de fondo.
        </li>
        <li>
            <code>lcd.setCursor(0, 0);</code> coloca el cursor en la
            primera columna de la primera fila.
        </li>
        <li>
            <code>lcd.print("LCD Dinamica v1");</code> muestra el título
            del proyecto en la primera línea.
        </li>
        <li>
            <code>void loop()</code> contiene las instrucciones que
            Arduino repite continuamente.
        </li>
        <li>
            <code>lcd.setCursor(0, 1);</code> coloca el cursor al comienzo
            de la segunda fila.
        </li>
        <li>
            <code>lcd.print("Contador: ");</code> muestra el texto que
            acompaña al número.
        </li>
        <li>
            <code>millis() / 1000</code> convierte aproximadamente
            los milisegundos transcurridos en segundos.
        </li>
        <li>
            <code>lcd.print(" s   ");</code> muestra la unidad de segundos
            y espacios adicionales que ayudan a borrar los caracteres
            sobrantes cuando el número cambia de cantidad de dígitos.
        </li>
        <li>
            <code>delay(1000);</code> espera aproximadamente un segundo
            antes de continuar con la siguiente repetición.
        </li>
    </ul>

    <h2>Simulador interactivo</h2>

    <p>
        Wokwi permite probar circuitos y programas de Arduino desde
        el navegador antes de montar el circuito real. Podés utilizarlo
        para observar el comportamiento de la pantalla y comprobar
        las conexiones.
    </p>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden my-4">
        <div class="ratio ratio-16x9">
            <iframe
                src="https://wokwi.com/projects/ID_DE_TU_PROYECTO_WOKWI/embed"
                title="Simulador de Arduino Pantalla LCD Dinámica"
                loading="lazy"
                allow="autoplay"
                style="border: 0;"
            ></iframe>
        </div>
    </div>

    <p>
        <strong>Importante:</strong>
        reemplazá ID_DE_TU_PROYECTO_WOKWI por el identificador real
        de tu proyecto de Wokwi. Si todavía no tenés una simulación,
        podés completar esta parte más adelante.
    </p>

    <h2>Resultado esperado</h2>

    <p>
        Al ejecutar el programa, la pantalla mostrará
        "LCD Dinamica v1" en la primera línea. En la segunda aparecerá
        "Contador:" seguido de los segundos aproximados transcurridos
        desde que comenzó a ejecutarse el programa.
    </p>

    <p>
        El contador se actualizará aproximadamente cada segundo.
        Cuando se reinicie Arduino, el conteo volverá a comenzar.
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
