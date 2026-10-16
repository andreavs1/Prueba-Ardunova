document.addEventListener('DOMContentLoaded', async () => {
    const app = document.getElementById('app-tutorial');

    try {
        // 1. Cargar el JSON
        const response = await fetch('tutorial1.json');
        if (!response.ok) throw new Error('No se pudo cargar tutorial1.json');
        const data = await response.json();

        // Helper para convertir **negrita** a HTML <strong>
        const formatBold = (text) => text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

        // 2. Renderizar el contenido
        app.innerHTML = `
            <div class="container my-5">
                <!-- Encabezado -->
                <header class="mb-4 text-center">
                    <span class="badge bg-primary px-3 py-2 mb-2">${data.badge}</span>
                    <h1 class="display-5 fw-bold text-dark">${data.titulo}</h1>
                    <p class="lead text-muted">${data.subtitulo}</p>
                </header>

                <!-- Concepto Principal -->
                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-body p-4 p-md-5 text-center">
                        <h2 class="h3 text-primary mb-3">${data.concepto_principal.titulo}</h2>
                        <p class="fs-5 text-secondary mx-auto" style="max-width: 750px;">
                            ${formatBold(data.concepto_principal.descripcion)}
                        </p>
                    </div>
                </div>

                <!-- SIMULADOR WOKWI EMBEBIDO -->
                <div class="card shadow-sm border-0 mb-5 overflow-hidden">
                    <div class="card-header bg-dark text-white p-3 text-center">
                        <h3 class="h5 mb-0">${data.simulador_wokwi.titulo}</h3>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-center text-secondary mb-3">
                            ${formatBold(data.simulador_wokwi.instruccion)}
                        </p>
                        
                        <!-- Contenedor Responsive de Iframe -->
                        <div class="ratio ratio-16x9 rounded overflow-hidden border shadow-sm mb-3" style="max-height: 480px;">
                            <iframe 
                                src="https://wokwi.com/projects/${data.simulador_wokwi.project_id}?embed=1" 
                                title="Simulador Wokwi Arduino"
                                allow="autoplay">
                            </iframe>
                        </div>

                        <div class="alert alert-info mb-0 small">
                            ${formatBold(data.simulador_wokwi.nota)}
                        </div>
                    </div>
                </div>

                <!-- Simulador de Lógica Teórica -->
                <div class="card shadow border-primary mb-5">
                    <div class="card-header bg-primary text-white p-3 text-center">
                        <h3 class="h5 mb-0">${data.simulador_logica.titulo}</h3>
                        <small>${data.simulador_logica.instruccion}</small>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-5 text-center">
                                <label class="form-label fw-bold">1. ¿Qué detecta el Sensor? (Entrada)</label>
                                <select id="sim-input" class="form-select form-select-lg mb-3">
                                    ${data.simulador_logica.opciones.map(opt => `
                                        <option value="${opt.id}">${opt.evento}</option>
                                    `).join('')}
                                </select>
                            </div>
                            <div class="col-md-2 text-center fs-2 text-muted">➔ 🧠 ➔</div>
                            <div class="col-md-5 text-center">
                                <label class="form-label fw-bold">2. Respuesta de Arduino (Salida)</label>
                                <div id="sim-output" class="p-3 bg-light rounded border border-2 text-primary fw-bold fs-5">
                                    ${data.simulador_logica.opciones[0].respuesta}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Anatomía de la Placa -->
                <h2 class="h3 mb-4 text-center">Explorá la Placa Arduino (Anatomía)</h2>
                <div class="row g-3 mb-5">
                    ${data.anatomia.map((item, index) => `
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm text-center p-3">
                                <div class="fs-1 text-${item.color_clase}">${item.icono}</div>
                                <h4 class="h5 fw-bold mt-2">${item.titulo}</h4>
                                <p class="small text-muted">${item.descripcion}</p>
                                <button class="btn btn-sm btn-outline-${item.color_clase} mt-auto" type="button" data-bs-toggle="collapse" data-bs-target="#desc-${index}">
                                    ${item.boton_texto}
                                </button>
                                <div class="collapse mt-2 text-start small bg-light p-2 rounded" id="desc-${index}">
                                    ${formatBold(item.detalle)}
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>

                <!-- Mini Quiz -->
                <div class="card bg-light border-0 p-4 mb-5 shadow-sm">
                    <h3 class="h5 fw-bold text-center mb-3">🧪 Mini-Comprobación Rápida</h3>
                    <p class="text-center text-muted mb-4">${data.quiz.pregunta}</p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        ${data.quiz.opciones.map(opt => `
                            <button class="btn btn-outline-secondary px-4 quiz-btn" data-correct="${opt.es_correcta}">
                                ${opt.texto}
                            </button>
                        `).join('')}
                    </div>
                    <div id="quiz-feedback" class="mt-3 text-center fw-bold"></div>
                </div>

                <!-- Navegación -->
                <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                    <a href="${data.navegacion.anterior}" class="btn btn-outline-secondary">← Volver a Tutoriales</a>
                    <a href="${data.navegacion.siguiente}" class="btn btn-primary px-4">Siguiente: Tu primer programa →</a>
                </div>
            </div>
        `;

        // 3. Lógica del Simulador de Lógica
        const selectSim = document.getElementById('sim-input');
        const outputSim = document.getElementById('sim-output');
        const respuestasMap = Object.fromEntries(data.simulador_logica.opciones.map(o => [o.id, o.respuesta]));

        selectSim.addEventListener('change', (e) => {
            outputSim.textContent = respuestasMap[e.target.value];
            outputSim.classList.add('bg-warning-subtle');
            setTimeout(() => outputSim.classList.remove('bg-warning-subtle'), 300);
        });

        // 4. Lógica del Quiz
        const quizBtns = document.querySelectorAll('.quiz-btn');
        const feedback = document.getElementById('quiz-feedback');

        quizBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                quizBtns.forEach(b => b.classList.remove('btn-success', 'btn-danger'));
                
                if (btn.dataset.correct === "true") {
                    btn.classList.add('btn-success');
                    feedback.innerHTML = `<span class="text-success">${data.quiz.mensaje_correcto}</span>`;
                } else {
                    btn.classList.add('btn-danger');
                    feedback.innerHTML = `<span class="text-danger">${data.quiz.mensaje_incorrecto}</span>`;
                }
            });
        });

    } catch (error) {
        app.innerHTML = `
            <div class="container my-5">
                <div class="alert alert-danger text-center">
                    <h4>Error al cargar el tutorial</h4>
                    <p class="mb-0">${error.message}</p>
                </div>
            </div>`;
    }
});