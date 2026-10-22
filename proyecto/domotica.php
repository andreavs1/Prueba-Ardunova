
<?php
session_start();
$active_page = 'proyectos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aprendé a controlar un sistema de domótica con ESP32, Wi-Fi y un sensor de temperatura y humedad.">
    <title>Domótica Básica - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">
    <span class="tag-nivel intermedio">Intermedio</span>
    <h1 class="section-title">Domótica Básica con ESP32</h1>

    <p>
        En este proyecto vamos a crear un sistema de domótica utilizando una
        placa ESP32. La domótica permite controlar y supervisar algunos
        dispositivos de una vivienda mediante la tecnología.
    </p>

    <div class="row g-4 align-items-stretch mt-2">
        <div class="col-12 col-lg-7">
            <div class="project-info">
                <h2>¿Qué vamos a aprender?</h2>
                <p>
                    Vamos a conectar el ESP32 a una red Wi-Fi, medir la
                    temperatura y la humedad de una habitación y mostrar esos
                    datos en una página web local.
                </p>

                <h3>Objetivo del proyecto</h3>
                <p>
                    Crear una interfaz web que permita consultar los datos del
                    sensor y enviar órdenes para encender o apagar un relé.
                    El relé funciona como un interruptor controlado
                    electrónicamente.
                </p>
            </div>
        </div>

        <div class="col-12 col-lg-5">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-image text-center p-3">
                    <img
                        src="<?= BASE_URL ?>assets/img/domotica(1).jpg"
                        alt="Proyecto de domótica básica"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5">
        <h2>Lista de componentes</h2>
        <ul>
            <li>Una placa ESP32 NodeMCU con Wi-Fi integrado.</li>
            <li>Un sensor de temperatura y humedad DHT11 o DHT22.</li>
            <li>Un módulo de relé de un canal compatible con el ESP32.</li>
            <li>Una protoboard y cables jumper, si son necesarios.</li>
            <li>Un cable USB y una fuente de alimentación adecuada para la placa.</li>
            <li>Una red Wi-Fi disponible para realizar la prueba.</li>
        </ul>
    </section>

    <section class="mt-5">
        <h2>Conexión de los componentes</h2>

        <h3>Sensor DHT11</h3>
        <ul>
            <li><strong>VCC:</strong> alimentación adecuada según el módulo.</li>
            <li><strong>GND:</strong> GND del ESP32.</li>
            <li><strong>DATA:</strong> GPIO 4 del ESP32.</li>
        </ul>

        <h3>Relé</h3>
        <ul>
            <li><strong>IN:</strong> GPIO 26 del ESP32, si el módulo es compatible.</li>
            <li><strong>GND:</strong> GND común, según las indicaciones del módulo.</li>
            <li><strong>VCC:</strong> alimentación especificada por el fabricante del relé.</li>
        </ul>

        <p>
            <strong>Importante:</strong> verificá el voltaje y la compatibilidad
            eléctrica del sensor y del relé antes de conectarlos. Para las
            primeras pruebas, utilizá una carga de baja tensión apropiada.
            No conectes una lámpara doméstica ni la tensión de red al relé
            como parte de una práctica escolar; ese montaje debe realizarlo
            una persona adulta calificada.
        </p>
    </section>

    <section class="mt-5">
        <h2>¿Cómo funciona el sistema?</h2>
        <ol>
            <li>El ESP32 se enciende e intenta conectarse a la red Wi-Fi configurada.</li>
            <li>Cuando se conecta, inicia un servidor web local.</li>
            <li>Desde un celular o una computadora en la misma red se abre la dirección IP que aparece en el Monitor Serie.</li>
            <li>La página muestra la temperatura y la humedad leídas por el sensor.</li>
            <li>Los botones de la página permiten enviar órdenes para activar o desactivar el relé.</li>
        </ol>
    </section>

    <section class="mt-5">
        <h2>Preparación del programa</h2>
        <ol>
            <li>Abrí el IDE de Arduino.</li>
            <li>Instalá las bibliotecas necesarias para el sensor DHT y sus dependencias.</li>
            <li>Seleccioná una placa ESP32 compatible.</li>
            <li>Reemplazá las credenciales de Wi-Fi de ejemplo por las de tu red privada.</li>
            <li>Cargá el programa en el ESP32 y abrí el Monitor Serie a 115200 baudios.</li>
            <li>Buscá la dirección IP que informa la placa y abrila desde un dispositivo conectado a la misma red.</li>
        </ol>
        <p>
            No publiques las credenciales reales de tu red Wi-Fi en la página
            web ni en un repositorio público.
        </p>
    </section>

    <section class="mt-5">
        <h2>Código del ESP32</h2>
        <p>
            Este programa es una versión corregida del código que compartiste.
            Mantiene el sensor en GPIO 4 y el relé en GPIO 26. También procesa
            correctamente las rutas de los botones para encender y apagar el relé.
        </p>

        <pre class="codigo p-3 rounded"><code>#include &lt;WiFi.h&gt;
#include "DHT.h"

const char* ssid = "TU_SSID_WIFI";
const char* password = "TU_PASSWORD_WIFI";

#define DHTPIN 4
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

const int relayPin = 26;
WiFiServer server(80);

void setup() {
    Serial.begin(115200);

    pinMode(relayPin, OUTPUT);
    digitalWrite(relayPin, LOW);

    dht.begin();

    Serial.print("Conectando a ");
    Serial.println(ssid);

    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println();
    Serial.println("Conectado a la red Wi-Fi");
    Serial.print("Direccion IP: ");
    Serial.println(WiFi.localIP());

    server.begin();
}

void loop() {
    WiFiClient client = server.available();

    if (!client) {
        return;
    }

    client.setTimeout(1000);

    String request = client.readStringUntil('\r');
    client.readStringUntil('\n');

    if (request.indexOf("GET /relay/on ") >= 0) {
        digitalWrite(relayPin, HIGH);
    } else if (request.indexOf("GET /relay/off ") >= 0) {
        digitalWrite(relayPin, LOW);
    }

    while (client.connected()) {
        String header = client.readStringUntil('\n');
        if (header.length() == 0 || header == "\r") {
            break;
        }
    }

    float h = dht.readHumidity();
    float t = dht.readTemperature();

    client.println("HTTP/1.1 200 OK");
    client.println("Content-type:text/html; charset=UTF-8");
    client.println("Connection: close");
    client.println();

    client.println("&lt;!DOCTYPE html&gt;&lt;html lang='es'&gt;");
    client.println("&lt;head&gt;");
    client.println("&lt;meta name='viewport' content='width=device-width, initial-scale=1'&gt;");
    client.println("&lt;title&gt;Domotica ESP32&lt;/title&gt;");
    client.println("&lt;style&gt;");
    client.println("body{font-family:Arial;text-align:center;margin:35px 10px;background:#f4f4f9;color:#333;}");
    client.println(".btn{background:#198754;color:white;padding:14px 22px;text-decoration:none;display:inline-block;margin:8px;border-radius:8px;}");
    client.println(".off{background:#dc3545;}");
    client.println(".panel{background:white;padding:20px;border-radius:12px;max-width:420px;margin:auto;}");
    client.println("&lt;/style&gt;&lt;/head&gt;&lt;body&gt;");

    client.println("&lt;div class='panel'&gt;");
    client.println("&lt;h1&gt;Sistema Domotico ESP32&lt;/h1&gt;");

    if (isnan(h) || isnan(t)) {
        client.println("&lt;p&gt;No se pudieron leer los datos del sensor. Revisá las conexiones.&lt;/p&gt;");
    } else {
        client.println("&lt;p&gt;&lt;b&gt;Temperatura:&lt;/b&gt; " + String(t, 1) + " &amp;deg;C&lt;/p&gt;");
        client.println("&lt;p&gt;&lt;b&gt;Humedad:&lt;/b&gt; " + String(h, 1) + " %&lt;/p&gt;");
    }

    if (digitalRead(relayPin) == HIGH) {
        client.println("&lt;p&gt;Estado del rele: &lt;b&gt;ACTIVADO&lt;/b&gt;&lt;/p&gt;");
        client.println("&lt;a class='btn off' href='/relay/off'&gt;Desactivar rele&lt;/a&gt;");
    } else {
        client.println("&lt;p&gt;Estado del rele: &lt;b&gt;DESACTIVADO&lt;/b&gt;&lt;/p&gt;");
        client.println("&lt;a class='btn' href='/relay/on'&gt;Activar rele&lt;/a&gt;");
    }

    client.println("&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;");
    client.println();

    client.stop();
}</code></pre>

        <p>
            <strong>Nota:</strong> el código anterior utiliza el estado HIGH
            para activar el relé. Algunos módulos funcionan al revés y se
            activan con LOW; verificá el comportamiento del modelo que uses
            antes de probarlo.
        </p>
    </section>

    <section class="mt-5">
        <h2>¿Cómo funciona el código?</h2>
        <ul>
            <li><code>#include &lt;WiFi.h&gt;</code> permite utilizar las funciones Wi-Fi del ESP32.</li>
            <li><code>#include "DHT.h"</code> incorpora las funciones para leer el sensor DHT.</li>
            <li><code>ssid</code> y <code>password</code> identifican la red Wi-Fi y su contraseña.</li>
            <li><code>DHTPIN</code> indica que el sensor está conectado al GPIO 4.</li>
            <li><code>DHTTYPE</code> define el tipo de sensor. Si usás un DHT22, hay que cambiarlo a <code>DHT22</code>.</li>
            <li><code>WiFi.begin()</code> inicia la conexión a la red inalámbrica.</li>
            <li><code>WiFi.localIP()</code> muestra la dirección que se debe abrir en el navegador.</li>
            <li><code>WiFiServer server(80)</code> crea el servidor web local en el puerto 80.</li>
            <li><code>server.available()</code> comprueba si un dispositivo se conectó al servidor.</li>
            <li><code>dht.readTemperature()</code> obtiene la temperatura y <code>dht.readHumidity()</code> obtiene la humedad.</li>
            <li>Las rutas <code>/relay/on</code> y <code>/relay/off</code> permiten solicitar la activación o desactivación del relé.</li>
            <li><code>client.println()</code> envía el contenido de la página web al navegador.</li>
        </ul>
    </section>

    <section class="mt-5">
        <h2>Resultado esperado</h2>
        <p>
            Cuando el ESP32 se conecta a la red, muestra su dirección IP en el
            Monitor Serie. Al abrir esa dirección desde otro dispositivo de la
            misma red, aparece una página con la temperatura, la humedad y un
            botón para cambiar el estado del relé.
        </p>
        <p>
            La lectura del sensor se actualiza cuando se vuelve a cargar la
            página. Para mostrar datos que se actualicen automáticamente sin
            recargar, habría que agregar una función adicional.
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
