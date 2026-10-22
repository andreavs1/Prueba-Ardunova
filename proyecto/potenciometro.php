<?php 
session_start(); 

if (!defined('BASE_URL')) {
    define('BASE_URL', '../');
}

$active_page = 'proyectos'; 
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Lectura de señales analógicas con potenciómetro y control de velocidad de parpadeo de LED en Arduino.">
    <title>Control con Potenciómetro - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=20261020-5">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container section-container">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title">Lectura de Potenciómetro</h1>

        <div class="row g-4 align-items-stretch">
            <div class="col-12 col-lg-7">
                <div class="project-info">
                    <h2>Explicación del Tutorial</h2>
                    <p>
                        En este tutorial aprenderás a trabajar con las entradas analógicas de tu placa Arduino. Al girar la perilla del potenciómetro modificás la resistencia y, por ende, el voltaje de entrada (de 0V a 5V). El conversor analógico-digital (ADC) de Arduino transforma ese voltaje en un valor numérico entre 0 y 1023, permitiéndote controlar en tiempo real el intervalo de parpadeo de un LED.
                    </p>
                    <h3>Objetivo</h3>
                    <p>Comprender el funcionamiento del conversor analógico-digital (ADC) de Arduino, utilizar la función <code>analogRead()</code> y transmitir lecturas hacia el Monitor Serie para su monitoreo.</p>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-image">
                        <img src="../assets/img/potenciometro.jpg" alt="Componentes del proyecto Potenciómetro" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>

        <!-- Lista de componentes -->
        <section class="mt-5">
            <h2 class="mb-4">Lista de Componentes</h2>
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Placa de Desarrollo</h5>
                        <p class="mb-0">1x Arduino UNO (o compatible)</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Componentes Analógicos</h5>
                        <p class="mb-0">1x Potenciómetro de 10kΩ</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Actuadores y Resistencias</h5>
                        <p class="mb-0">1x LED estándar (5mm)<br>1x Resistencia de 220Ω</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Auxiliares</h5>
                        <p class="mb-0">1x Protoboard y Cables Jumper Macho-Macho</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Conexión de cables -->
        <section class="mt-5">
            <h2 class="mb-4">Conexión de Cables</h2>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Componente</th>
                            <th>Pin / Terminal</th>
                            <th>Pin en Arduino UNO</th>
                            <th>Notas / Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3"><strong>Potenciómetro (10kΩ)</strong></td>
                            <td>Terminal Izquierdo</td>
                            <td>5V</td>
                            <td>Alimentación del potenciómetro</td>
                        </tr>
                        <tr>
                            <td>Terminal Central (Limpiador)</td>
                            <td>Pin Analógico A0</td>
                            <td>Lectura de tensión de variable (0V a 5V)</td>
                        </tr>
                        <tr>
                            <td>Terminal Derecho</td>
                            <td>GND</td>
                            <td>Tierra común</td>
                        </tr>
                        <tr>
                            <td rowspan="2"><strong>LED (5mm)</strong></td>
                            <td>Ánodo (pata larga, +)</td>
                            <td>Pin Digital 13</td>
                            <td>Salida digital de iluminación</td>
                        </tr>
                        <tr>
                            <td>Cátodo (pata corta, -)</td>
                            <td>GND (a través de R 220Ω)</td>
                            <td>Conexión a masa con resistencia limitadora</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- CÓDIGO DE ARDUINO -->
        <section class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Código de Arduino (.ino)</h2>
                <button class="btn btn-sm btn-outline-primary" onclick="copiarCodigo()">Copiar Código</button>
            </div>
            <div class="card bg-dark text-light p-3 border-0 rounded-3">
                <pre class="mb-0"><code id="codigoArduino">const int potPin = A0;  // Pin analógico conectado al potenciómetro
const int ledPin = 13;  // Pin digital conectado al LED

int valorPot = 0;       // Variable para almacenar la lectura analógica

void setup() {
  pinMode(ledPin, OUTPUT);
  Serial.begin(9600);   // Inicia la comunicación serie a 9600 baudios
}

void loop() {
  valorPot = analogRead(potPin); // Lee la tensión del potenciómetro (0 a 1023)
  
  // Muestra el valor en la consola del Monitor Serie
  Serial.print("Valor del potenciómetro: ");
  Serial.println(valorPot);

  digitalWrite(ledPin, HIGH);   // Enciende el LED
  delay(valorPot);              // Retardo proporcional al valor analógico (ms)
  
  digitalWrite(ledPin, LOW);    // Apaga el LED
  delay(valorPot);              // Retardo proporcional al valor analógico (ms)
}</code></pre>
            </div>
        </section>

        <!-- Descripción paso por paso -->
        <section class="mt-5">
            <h2 class="mb-4">Descripción Paso por Paso</h2>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>1. Montaje del Circuito</h4>
                        <p>Insertá el potenciómetro y el LED en la protoboard. Conectá las patillas exteriores del potenciómetro a 5V y GND, y la pata central al pin A0. Conectá el LED al pin 13 con la resistencia de 220Ω a GND.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>2. Carga del Código</h4>
                        <p>Abrí Arduino IDE, copiá el código provisto en esta página, seleccioná la placa <em>Arduino UNO</em> y el puerto COM asignado, y hacé clic en **Subir**.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>3. Monitor Serie</h4>
                        <p>Abrí el Monitor Serie del Arduino IDE (Ctrl + Shift + M) configurado a 9600 baudios para observar los valores numéricos que genera la perilla en tiempo real.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>4. Prueba de Funcionamiento</h4>
                        <p>Girá la perilla del potenciómetro hacia ambos extremos. Verificá cómo al reducir el valor el parpadeo del LED se acelera y al aumentarlo el parpadeo se vuelve más lento.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center button-container my-5">
            <a href="../proyecto/proyectos.php" class="btn btn-outline-cyan">← Volver a Proyectos</a>
        </div>
    </main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copiarCodigo() {
            const codigo = document.getElementById('codigoArduino').innerText;
            navigator.clipboard.writeText(codigo).then(() => {
                alert('¡Código copiado al portapapeles!');
            });
        }
    </script>
</body>

</html>