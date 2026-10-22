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
    <meta name="description" content="Aprende a controlar la posición y el ángulo de un servomotor SG90 paso a paso con Arduino.">
    <title>Servomotor con Arduino - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=20261020-5">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container section-container">
        <span class="tag-nivel principiante">Principiante</span>
        <h1 class="section-title">Servomotor con Arduino</h1>

        <div class="row g-4 align-items-stretch">
            <div class="col-12 col-lg-7">
                <div class="project-info">
                    <h2>Explicación del Tutorial</h2>
                    <p>
                        Este tutorial aborda el control preciso de movimiento angular mediante un servomotor (como el modelo micro servo SG90). A diferencia de los motores DC convencionales, un servomotor permite posicionar su eje en ángulos específicos (entre 0° y 180°) gracias a su sistema interno de engranajes y potenciómetro de retroalimentación. Aprenderás a utilizar señales de modulación por ancho de pulsos (PWM) integradas en la librería estándar de Arduino.
                    </p>
                    <h3>Objetivo</h3>
                    <p>Comprender el funcionamiento de un servomotor, utilizar la librería <code>Servo.h</code>, configurar salidas de control angulares y secuenciar movimientos automáticos de posicionamiento.</p>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-image text-center p-3">
                        <img src="../assets/img/servomotor.jpg" alt="Servomotor utilizado en el proyecto" class="img-fluid rounded">
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
                        <h5>Actuadores</h5>
                        <p class="mb-0">1x Servomotor SG90 (o TowerPro similar)</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Conectividad</h5>
                        <p class="mb-0">3x Cables Jumper Macho-Macho</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Alimentación</h5>
                        <p class="mb-0">1x Cable USB de programación para Arduino</p>
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
                            <th>Color del Cable</th>
                            <th>Pin en Arduino UNO</th>
                            <th>Notas / Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3"><strong>Servomotor (SG90)</strong></td>
                            <td>Rojo</td>
                            <td>5V</td>
                            <td>Alimentación del motor (5V DC)</td>
                        </tr>
                        <tr>
                            <td>Marrón / Negro</td>
                            <td>GND</td>
                            <td>Tierra o polo negativo común</td>
                        </tr>
                        <tr>
                            <td>Naranja / Amarillo</td>
                            <td>Pin Digital 9 (PWM)</td>
                            <td>Señal de control de posición angular</td>
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
                <pre class="mb-0"><code id="codigoArduino">#include &lt;Servo.h&gt; // Incluye la librería oficial para controlar servomotores

Servo miServo; // Crea un objeto de tipo Servo para controlar el motor

void setup() {
  miServo.attach(9); // Vincula el objeto Servo al pin digital 9
}

void loop() {
  miServo.write(0);    // Posiciona el servomotor a 0 grados
  delay(1000);         // Espera 1 segundo

  miServo.write(90);   // Posiciona el servomotor a 90 grados
  delay(1000);         // Espera 1 segundo

  miServo.write(180);  // Posiciona el servomotor a 180 grados
  delay(1000);         // Espera 1 segundo

  miServo.write(90);   // Regresa el servomotor a 90 grados
  delay(1000);         // Espera 1 segundo
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
                        <p>Conectá los cables del servomotor respetando sus colores: Rojo a 5V, Marrón/Negro a GND y el cable de señal (Naranja/Amarillo) al pin digital 9 del Arduino.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>2. Carga del Código</h4>
                        <p>Conectá la placa por USB a la computadora, abrí el Arduino IDE, pegá el código provisto, seleccioná la placa <em>Arduino UNO</em> y el puerto COM activo, y hacé clic en **Subir**.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>3. Verificación de Movimiento</h4>
                        <p>Observá la rotación del eje del servomotor. El eje se moverá secuencialmente a 0°, 90°, 180° y regresará a 90° con pausas exactas de 1 segundo entre cada posición.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>4. Pruebas y Modificaciones</h4>
                        <p>Modificá los parámetros numéricos dentro de la función <code>miServo.write(ángulo)</code> en el código para probar diferentes posiciones angulares entre 0° y 180°.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center button-container my-5">
            <a href="../proyecto/proyectos.php" class="btn btn-outline-cyan">← Volver a Proyectos</a>
        </div>
    </main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
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