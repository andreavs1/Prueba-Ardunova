
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Proyecto: Sistema de Riego Automático - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container">

    <div class="project-header">

        <span class="tag-nivel intermedio">Intermedio</span>

        <h1 class="section-title mb-2">
            💧 Sistema de Riego Automático
        </h1>

        <p class="section-subtitle">
            Automatizá el riego de una planta utilizando un sensor de humedad.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-12 col-lg-7">

            <div class="project-info">

                <h2>Explicación</h2>

                <p>
                    En este proyecto construiremos un sistema de riego automático
                    utilizando Arduino y un sensor de humedad del suelo.
                </p>

                <p>
                    El sensor permite conocer si la tierra está seca o húmeda.
                    Cuando Arduino detecta que la humedad está por debajo de un
                    determinado nivel, activa una bomba de agua para regar
                    automáticamente la planta.
                </p>

                <h3>Materiales</h3>

                <ul>
                    <li>Arduino UNO</li>
                    <li>Sensor de humedad del suelo</li>
                    <li>Módulo relé</li>
                    <li>Bomba de agua</li>
                    <li>Manguera</li>
                    <li>Fuente de alimentación</li>
                    <li>Protoboard y cables</li>
                </ul>

            </div>

        </div>

        <div class="col-12 col-lg-5">

            <div class="card h-100">

                <div class="card-image">

                    <img src="../assets/img/SistemaDeRiego.jpg"
                         alt="Sistema de riego automático">

                    <img src="../assets/img/sistemaDeRiego1.jpg"
                         alt="Proyecto de sistema de riego">

                </div>

            </div>

        </div>

    </div>

    <section class="code-section mt-5">

        <h2>💻 Código</h2>

        <div class="card code-card">

            <pre><code>const int sensorHumedad = A0;
const int rele = 7;

int valorHumedad = 0;
int umbral = 500;

void setup() {

  pinMode(rele, OUTPUT);

  Serial.begin(9600);

  digitalWrite(rele, HIGH);
}

void loop() {

  valorHumedad = analogRead(sensorHumedad);

  Serial.print("Humedad del suelo: ");
  Serial.println(valorHumedad);

  if (valorHumedad < umbral) {

    digitalWrite(rele, LOW);

    Serial.println("Tierra seca - Activando riego");

  } else {

    digitalWrite(rele, HIGH);

    Serial.println("Tierra húmeda - Riego apagado");
  }

  delay(1000);
}</code></pre>

        </div>

    </section>

    <section class="steps-section mt-5">

        <h2 class="mb-4">🔧 Paso a paso</h2>

        <div class="row g-3">

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>1. Conexiones</h4>

                    <p>
                        Conectá el sensor de humedad al pin A0 de Arduino.
                        Luego conectá el módulo relé al pin digital 7.
                    </p>

                </div>

            </div>

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>2. Programación</h4>

                    <p>
                        Copiá el código en Arduino IDE y conectá la placa
                        a la computadora mediante el cable USB.
                    </p>

                </div>

            </div>

            <div class="col-12 col-md-4">

                <div class="setup-step p-4">

                    <h4>3. Prueba</h4>

                    <p>
                        Colocá el sensor en la tierra. Cuando detecte que
                        está seca, el sistema activará el riego.
                    </p>

                </div>

            </div>

        </div>

        <div class="result-card mt-4">

            <h4>🌱 Resultado esperado</h4>

            <p class="mb-0">
                Cuando la tierra esté seca, Arduino activará automáticamente
                el sistema de riego. Cuando la humedad alcance el nivel
                establecido, la bomba se apagará.
            </p>

        </div>

        <div class="text-center button-container mt-4">

            <a href="proyectos.php" class="btn btn-outline-cyan">
                ← Volver a Proyectos
            </a>

        </div>

    </section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
