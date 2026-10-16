document.addEventListener('DOMContentLoaded', () => {
    const contenedor = document.getElementById('app-tutorial');

    if (contenedor) {
        // 1. Inyección completa del contenido original del Tutorial 6
        contenedor.innerHTML = `
        <div class="container mt-4 mb-5">
            <h2>6. Entradas y salidas</h2>

            <p>
                Las entradas permiten que Arduino reciba información de componentes
                como botones o sensores.
            </p>

            <p>
                Las salidas permiten controlar componentes como LEDs, motores o
                buzzer.
            </p>

            <h3>Código de ejemplo</h3>

            <pre class="bg-light p-3 border rounded">
int led = 13;
int boton = 2;

void setup() {
    pinMode(led, OUTPUT);
    pinMode(boton, INPUT);
}

void loop() {

    if (digitalRead(boton) == HIGH) {
        digitalWrite(led, HIGH);
    } else {
        digitalWrite(led, LOW);
    }
}
            </pre>

            <!-- Botón de interacción y estado -->
            <div class="mt-4 p-3 bg-light border rounded">
                <button id="btnCompletar" class="btn btn-primary">Marcar lección como completada</button>
                <p id="mensajeEstado" class="mt-2 mb-0 fw-bold"></p>
            </div>
        </div>
        `;

        // 2. Conexión con PHP (guardar el progreso de la lección)
        document.getElementById('btnCompletar').addEventListener('click', () => {
            const mensaje = document.getElementById('mensajeEstado');
            mensaje.className = 'mt-2 mb-0 text-info';
            mensaje.innerText = 'Guardando progreso...';

            fetch('guardar-progreso.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    id_tutorial: 6,
                    titulo: "Entradas y salidas",
                    completado: true
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' || data.status === 'ok') {
                    mensaje.className = 'mt-2 mb-0 text-success';
                    mensaje.innerText = '¡Progreso guardado correctamente!';
                } else {
                    mensaje.className = 'mt-2 mb-0 text-danger';
                    mensaje.innerText = 'Atención: ' + (data.mensaje || 'No se pudo registrar.');
                }
            })
            .catch(error => {
                console.error('Error al conectar con PHP:', error);
                mensaje.className = 'mt-2 mb-0 text-danger';
                mensaje.innerText = 'Error de conexión con el servidor.';
            });
        });
    }
});