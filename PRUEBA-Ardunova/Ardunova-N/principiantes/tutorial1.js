document.addEventListener('DOMContentLoaded', () => {
    const contenedor = document.getElementById('app-tutorial');

    if (contenedor) {
        // 1. Inyección limpia del contenido dentro del contenedor
        contenedor.innerHTML = `
        <div class="container mt-4 mb-5">
            <h2>1. ¿Qué es Arduino?</h2>

            <p>
                Arduino es una plataforma electrónica que permite crear proyectos
                utilizando una placa programable. 
                Se puede usar para controlar luces,
                motores, sensores y muchos otros componentes.
            </p>

            <p>
                Es muy utilizado para aprender programación y electrónica porque
                es sencillo de utilizar.
            </p>

            <h3>Código de ejemplo</h3>

            <pre class="bg-light p-3 border rounded">
void setup() {
    Serial.begin(9600);
}

void loop() {
    Serial.println("Hola Arduino");
    delay(1000);
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
                    id_tutorial: 1,
                    titulo: "¿Qué es Arduino?",
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