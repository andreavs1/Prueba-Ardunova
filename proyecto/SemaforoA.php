<?php
session_start();
include __DIR__ . '/../conexion.php'; 

$id_proyecto_actual = 3;
$proyecto_completado = false;

if (isset($_SESSION['usuario']) && isset($conn)) {
    $nombre_usuario = $_SESSION['usuario'];
    $stmt_u = $conn->prepare('SELECT id_usuarios FROM usuarios WHERE nombre = ? LIMIT 1');
    $stmt_u->bind_param('s', $nombre_usuario);
    $stmt_u->execute();
    $res_u = $stmt_u->get_result()->fetch_assoc();
    
    if ($res_u) {
        $id_usuarios = $res_u['id_usuarios'];
        $stmt_prog = $conn->prepare('SELECT completado FROM progreso WHERE id_usuarios = ? AND id_proyecto = ? AND completado = 1 LIMIT 1');
        $stmt_prog->bind_param('ii', $id_usuarios, $id_proyecto_actual);
        $stmt_prog->execute();
        if ($stmt_prog->get_result()->num_rows > 0) {
            $proyecto_completado = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Diseño funcional de un semáforo inteligente con Arduino, cruce peatonal y temporizaciones secuenciales.">
    <title>Semáforo Avanzado con Paso Peatonal - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=20261020-5">
</head>

<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

    <main class="container section-container">
        <span class="tag-nivel intermedio">Intermedio</span>
        <h1 class="section-title">Semáforo Avanzado con Paso Peatonal</h1>

        <div class="row g-4 align-items-stretch">
            <div class="col-12 col-lg-7">
                <div class="project-info">
                    <h2>Explicación del Tutorial</h2>
                    <p>
                        Este tutorial representa la evolución de un sistema de semáforo básico hacia una solución vial inteligente. Aprenderás a coordinar el tráfico vehicular con el cruce peatonal mediante la integración de un botón a demanda. El sistema mantiene el paso libre a los vehículos hasta que un peatón presiona el botón, activando una secuencia segura de cambio de luces y temporizaciones.
                    </p>
                    <h3>Objetivo</h3>
                    <p>Dominar la lectura de entradas digitales con pulsadores, sincronizar múltiples salidas digitales para controlar dos grupos de semáforos (vehicular y peatonal) y gestionar tiempos de espera seguros para la circulación.</p>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-image text-center p-3">
                        <img src="../assets/img/semaforo-arduino.png" alt="Semáforo Avanzado" class="img-fluid rounded">
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
                        <h5>Iluminación / LEDs</h5>
                        <p class="mb-0">2x LEDs Rojos<br>1x LED Amarillo<br>2x LEDs Verdes</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Resistencias</h5>
                        <p class="mb-0">5x Resistencia de 220Ω (para LEDs)<br>1x Resistencia de 10kΩ (Pull-down)</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="p-3 border rounded bg-light h-100">
                        <h5>Entradas y Conexión</h5>
                        <p class="mb-0">1x Pulsador (Push Button)<br>1x Protoboard y Cables Jumper</p>
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
                            <th>Color / Elemento</th>
                            <th>Pin en Arduino UNO</th>
                            <th>Notas / Función</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="3"><strong>Semáforo Vehicular</strong></td>
                            <td>LED Verde</td>
                            <td>Pin Digital 10</td>
                            <td>Señal de avance vehicular (con R 220Ω)</td>
                        </tr>
                        <tr>
                            <td>LED Amarillo</td>
                            <td>Pin Digital 9</td>
                            <td>Señal de precaución (con R 220Ω)</td>
                        </tr>
                        <tr>
                            <td>LED Rojo</td>
                            <td>Pin Digital 8</td>
                            <td>Señal de detención vehicular (con R 220Ω)</td>
                        </tr>
                        <tr>
                            <td rowspan="2"><strong>Semáforo Peatonal</strong></td>
                            <td>LED Verde</td>
                            <td>Pin Digital 6</td>
                            <td>Señal de cruce seguro para peatón (con R 220Ω)</td>
                        </tr>
                        <tr>
                            <td>LED Rojo</td>
                            <td>Pin Digital 7</td>
                            <td>Señal de prohibido cruzar peatón (con R 220Ω)</td>
                        </tr>
                        <tr>
                            <td rowspan="2"><strong>Pulsador Peatón</strong></td>
                            <td>Terminal A</td>
                            <td>5V</td>
                            <td>Entrada de alimentación para el botón</td>
                        </tr>
                        <tr>
                            <td>Terminal B</td>
                            <td>Pin Digital 2 (con R 10kΩ a GND)</td>
                            <td>Lectura digital con resistencia Pull-Down</td>
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
                <pre class="mb-0"><code id="codigoArduino">// Asignación de pines del Semáforo Vehicular
const int vVehiculo = 10;
const int aVehiculo = 9;
const int rVehiculo = 8;

// Asignación de pines del Semáforo Peatonal
const int vPeaton = 6;
const int rPeaton = 7;

// Pin del botón de demanda peatonal
const int boton = 2;

void setup() {
  // Configuración de salidas para LEDs vehiculares
  pinMode(vVehiculo, OUTPUT);
  pinMode(aVehiculo, OUTPUT);
  pinMode(rVehiculo, OUTPUT);

  // Configuración de salidas para LEDs peatonales
  pinMode(vPeaton, OUTPUT);
  pinMode(rPeaton, OUTPUT);

  // Configuración de entrada para el pulsador
  pinMode(boton, INPUT);
}

void loop() {
  // Estado normal: Vehículos en VERDE, Peatones en ROJO
  digitalWrite(vVehiculo, HIGH);
  digitalWrite(aVehiculo, LOW);
  digitalWrite(rVehiculo, LOW);

  digitalWrite(vPeaton, LOW);
  digitalWrite(rPeaton, HIGH);

  // Si un peatón presiona el botón, se activa la secuencia de cruce
  if (digitalRead(boton) == HIGH) {
    delay(1000); // Pequeña pausa de seguridad antes del cambio
    
    // Transición vehicular a AMARILLO
    digitalWrite(vVehiculo, LOW);
    digitalWrite(aVehiculo, HIGH);
    delay(2000);

    // Vehículos a ROJO y Peatones a VERDE
    digitalWrite(aVehiculo, LOW);
    digitalWrite(rVehiculo, HIGH);
    
    digitalWrite(rPeaton, LOW);
    digitalWrite(vPeaton, HIGH);
    delay(5000); // Tiempo para que el peatón cruce

    // Parpadeo de advertencia en luz peatonal verde
    for (int i = 0; i < 4; i++) {
      digitalWrite(vPeaton, LOW);
      delay(250);
      digitalWrite(vPeaton, HIGH);
      delay(250);
    }

    // Regreso al estado inicial
    digitalWrite(vPeaton, LOW);
    digitalWrite(rPeaton, HIGH);
    digitalWrite(rVehiculo, LOW);
  }
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
                        <p>Colocá los 5 LEDs y el pulsador en la protoboard. Cableá cada LED con su correspondiente resistencia de 220Ω hacia GND, y conectá la resistencia Pull-Down de 10kΩ al pin 2 para el botón.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>2. Carga del Código</h4>
                        <p>Conectá la placa Arduino UNO por USB a la computadora, abrí el entorno Arduino IDE, pegá el código fuente, seleccioná el puerto COM correcto y subí el programa.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>3. Verificación de Inicio</h4>
                        <p>Comprobá que por defecto el semáforo vehicular permanezca en color Verde y el semáforo peatonal en color Rojo, esperando la interacción del usuario.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="setup-step p-4 border rounded h-100">
                        <h4>4. Prueba de Cruce Peatonal</h4>
                        <p>Presioná el pulsador de demanda para simular a un peatón. Verificá que el semáforo vehicular pase a Amarillo, luego a Rojo, y que el semáforo peatonal habilite la luz Verde antes de reiniciar el ciclo.</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center button-container my-5 d-flex justify-content-center gap-3 flex-wrap">
            <a href="../proyecto/proyectos.php" class="btn btn-outline-cyan">← Volver a Proyectos</a>
            <button id="btnCompletar" class="btn btn-success" data-proyecto-id="3"> ✓ Marcar como completado</button>
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
        
document.addEventListener("DOMContentLoaded", () => {
    const btnCompletar = document.getElementById("btnCompletar");

    if (!btnCompletar) {
        console.error("No se encontró el botón con id 'btnCompletar'.");
        return;
    }

    btnCompletar.addEventListener("click", async () => {
        const idProyecto = btnCompletar.getAttribute("data-proyecto-id");
        console.log("Enviando ID de proyecto:", idProyecto);

        try {
            const res = await fetch("../guardar_progreso.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id_proyecto: idProyecto })
            });

            const textoRespuesta = await res.text();
            console.log("Respuesta del servidor:", textoRespuesta);

            let resultado;
            try {
                resultado = JSON.parse(textoRespuesta);
            } catch (e) {
                throw new Error("El servidor no devolvió un JSON válido. Respuesta: " + textoRespuesta);
            }

            if (resultado.ok) {
                btnCompletar.textContent = "✓ Completado";
                btnCompletar.classList.remove("btn-outline-success");
                btnCompletar.classList.add("btn-success");
                btnCompletar.disabled = true;
            } else {
                alert("Error del servidor: " + (resultado.mensaje || "Desconocido"));
            }
        } catch (err) {
            console.error("Error en el fetch:", err);
            alert("Error de conexión: " + err.message);
        }
    });
});
    </script>
</body>

</html>
