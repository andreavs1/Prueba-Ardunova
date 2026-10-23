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
    <meta name="description" content="El clásico Hola Mundo del hardware libre: Parpadeo de LED (Blink) con Arduino.">
    <title>Parpadeo de LED (Blink) - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=20261020-5">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container section-container">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title">Parpadeo de LED (Blink)</h1>

        <div class="row g-4 align-items-stretch">
            <div class="col-12 col-lg-7">
                <div class="project-info">
                    <h2>Explicación del Tutorial</h2>
                    <p>
                        Este proyecto es el clásico "Hola Mundo" del desarrollo con microcontroladores y hardware libre. Permite comprender el concepto fundamental de salida digital, controlando el flujo de corriente hacia un diodo emisor de luz (LED) mediante programación para alternar su estado entre encendido (HIGH) y apagado (LOW) a intervalos regulares de tiempo.
                    </p>
                    <h3>Objetivo</h3>
                    <p>Aprender a configurar un pin digital de la placa Arduino como salida, utilizar funciones básicas de tiempo (delay) y verificar la correcta comunicación entre el software y el circuito físico.</p>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card h-100">
                    <div class="card-image">
                        <img src="../assets/img/lcd.jpg" alt="Componentes del proyecto LED">
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
                        <h5>Actuadores / Luz</h5>
                        <p class="mb-0">1x LED estándar (5mm, de cualquier color)</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Resistencias</h5>
                        <p class="mb-0">1x Resistencia de 220Ω (o 330Ω)</p>
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
                            <th>Terminal / Pin</th>
                            <th>Pin en Arduino UNO</th>
                            <th>Notas / Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="2"><strong>LED (5mm)</strong></td>
                            <td>Ánodo (pata larga, +)</td>
                            <td>Pin Digital 13</td>
                            <td>Salida digital de control (5V)</td>
                        </tr>
                        <tr>
                            <td>Cátodo (pata corta, -)</td>
                            <td>GND (a través de R 220Ω)</td>
                            <td>Conectado en serie con la resistencia limitadora a Tierra</td>
                        </tr>
                        <tr>
                            <td><strong>Resistencia 220Ω</strong></td>
                            <td>Extremo 1 / Extremo 2</td>
                            <td>Entre Cátodo del LED y GND</td>
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
                <pre class="mb-0"><code id="codigoArduino">// Pin asignado al LED
const int pinLED = 13;

void setup() {
  // Configura el pin digital 13 como salida
  pinMode(pinLED, OUTPUT);
}

void loop() {
  digitalWrite(pinLED, HIGH); // Enciende el LED (envia 5V)
  delay(1000);                // Espera 1 segundo (1000 ms)
  
  digitalWrite(pinLED, LOW);  // Apaga el LED (0V)
  delay(1000);                // Espera 1 segundo (1000 ms)
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
                        <p>Colocá el LED en la protoboard. Conectá el ánodo (pata larga) al pin 13 de Arduino y el cátodo (pata corta) al terminal GND pasando por la resistencia de 220Ω.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>2. Preparación en IDE</h4>
                        <p>Abrí el Arduino IDE en tu computadora, seleccioná la placa <em>Arduino UNO</em> en el menú Herramientas y elegí el puerto serie COM correspondiente.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>3. Carga del Programa</h4>
                        <p>Copiá el código anterior, pegalo dentro del editor del programa y hacé clic en el botón de **Subir** (flecha hacia la derecha) para programar la placa.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>4. Verificación</h4>
                        <p>Observá el LED externo (y el LED marcado con 'L' integrado en la propia placa). Ambos deberán encenderse y apagarse continuamente a intervalos exactos de 1 segundo.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center button-container my-5 d-flex justify-content-center gap-3 flex-wrap">
            <a href="../proyecto/proyectos.php" class="btn btn-outline-cyan">← Volver a Proyectos</a>
            <button id="btnCompletar" class="btn btn-success" data-proyecto-id="1"> ✓ Marcar como completado</button>
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
