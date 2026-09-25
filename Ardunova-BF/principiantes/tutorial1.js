document.body.innerHTML = `
<header class="bg-dark text-white text-center p-4">
    <h1>ARDUNOVA</h1>
    <p>Aprendé Arduino, creá el futuro</p>
</header>

<div class="container mt-4">
    <h2>1. ¿Qué es Arduino?</h2>

    <p>
        Arduino es una plataforma electrónica que permite crear proyectos
        utilizando una placa programable. Se puede usar para controlar luces,
        motores, sensores y muchos otros componentes.
    </p>

    <p>
        Es muy utilizado para aprender programación y electrónica porque
        es sencillo de utilizar.
    </p>

    <h3>Código de ejemplo</h3>

    <pre class="bg-light p-3">
void setup() {
    Serial.begin(9600);
}

void loop() {
    Serial.println("Hola Arduino");
    delay(1000);
}
    </pre>
</div>
`;
