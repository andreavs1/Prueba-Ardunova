
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Aprendé a encender y apagar un LED con Arduino paso a paso.">

    <title>Parpadeo de LED (Blink) - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container py-4">

    <div class="project-header">
        <span class="tag-nivel principiante">Principiante</span>

        <h1 class="section-title mb-2">Parpadeo de LED (Blink)</h1>

        <p class="section-subtitle">
            El clásico "Hola Mundo" del hardware libre.
        </p>
    </div>

    <h2>Explicación del proyecto</h2>

    <p>
        En este proyecto vamos a aprender a encender y apagar un LED
        utilizando una placa Arduino UNO. El programa controla una
        salida digital para que el LED permanezca encendido durante
        un segundo y apagado durante otro segundo.
    </p>

    <h2>¿Qué vamos a aprender?</h2>

    <p>
        Vamos a conocer cómo configurar un pin digital como salida,
        controlar el estado de un LED mediante instrucciones de Arduino
        y utilizar la función delay() para establecer pausas.
        Este proyecto permite comprender los conceptos básicos
        de la programación y la electrónica.
    </p>

    <div class="text-center my-4">
        <img
            src="<?= $base ?>assets/img/ledBlink1.png"
            alt="Proyecto de parpadeo de LED con Arduino"
            class="img-fluid rounded"
            style="max-width: 500px;"
        >
    </div>

    <h2>Lista de componentes</h2>

    <ul>
        <li>Una placa Arduino UNO.</li>
        <li>Un LED.</li>
        <li>Una resistencia de 220 ohmios.</li>
        <li>Una protoboard.</li>
        <li>Cables jumper.</li>
        <li>Un cable USB para conectar Arduino a la computadora.</li>
    </ul>

    <p>
        También se puede probar el código utilizando el LED integrado
        de muchas placas Arduino UNO, conectado al pin 13, sin necesidad
        de montar un circuito externo.
    </p>

    <h2>Conexión de los cables</h2>

    <p>
        Si utilizás un LED externo, realizá las siguientes conexiones:
    </p>

    <ul>
        <li>
            <strong>Pata larga del LED (ánodo):</strong>
            conectala al pin digital 13 de Arduino.
        </li>
        <li>
            <strong>Pata corta del LED (cátodo):</strong>
            conectala a GND mediante una resistencia de 220 ohmios.
        </li>
        <li>
            <strong>Resistencia:</strong>
            limita la corriente que circula por el LED para protegerlo.
        </li>
    </ul>

    <p>
        Verificá las conexiones antes de conectar la placa a la computadora.
        Si utilizás el LED integrado de Arduino, no necesitás conectar
        un LED externo.
    </p>

    <h2>Procedimiento paso a paso</h2>

    <ol>
        <li>Prepará la placa Arduino UNO, el LED, la resistencia y los cables.</li>
        <li>Conectá el LED externo al pin digital 13 y a GND mediante la resistencia.</li>
        <li>Conectá Arduino a la computadora mediante el cable USB.</li>
        <li>Abrí el IDE de Arduino y creá un nuevo programa.</li>
        <li>Copiá el código que aparece a continuación.</li>
        <li>Seleccioná la placa Arduino UNO y el puerto correspondiente.</li>
        <li>Verificá el programa y cargalo en la placa.</li>
        <li>Observá cómo el LED se enciende y se apaga continuamente.</li>
    </ol>

    <h2>Código de Arduino</h2>

    <p>
        El programa configura el pin 13 como salida y alterna el estado
        del LED utilizando digitalWrite(). La función delay(1000)
        introduce una pausa de un segundo entre cada cambio.
    </p>

    <pre class="p-3 rounded" style="background-color: #f1f1f1; color: #222; white-space: pre-wrap;"><code>void setup() {
    pinMode(13, OUTPUT);
}

void loop() {
    digitalWrite(13, HIGH);
    delay(1000);
    digitalWrite(13, LOW);
    delay(1000);
}</code>
</pre>

    <h2>¿Cómo funciona el código?</h2>

    <ul>
        <li>
            <code>void setup()</code> se ejecuta una vez al iniciar
            el programa y sirve para configurar la placa.
        </li>
        <li>
            <code>pinMode(13, OUTPUT);</code> configura el pin digital 13
            como salida para controlar el LED.
        </li>
        <li>
            <code>void loop()</code> contiene las instrucciones que Arduino
            repite continuamente.
        </li>
        <li>
            <code>digitalWrite(13, HIGH);</code> coloca el pin 13 en estado
            alto, encendiendo el LED conectado correctamente.
        </li>
        <li>
            <code>delay(1000);</code> detiene la ejecución durante
            aproximadamente 1000 milisegundos, es decir, un segundo.
        </li>
        <li>
            <code>digitalWrite(13, LOW);</code> coloca el pin 13 en estado
            bajo y apaga el LED.
        </li>
        <li>
            El segundo <code>delay(1000);</code> mantiene el LED apagado
            durante un segundo antes de repetir el ciclo.
        </li>
    </ul>

    <h2>Resultado esperado</h2>

    <p>
        Al ejecutar el programa, el LED se encenderá durante un segundo
        y permanecerá apagado durante el siguiente. Esta secuencia se
        repetirá continuamente mientras Arduino esté funcionando.
    </p>

    <div class="text-center button-container my-4">
        <a
            href="<?= $base ?>proyecto/proyectos.php"
            class="btn btn-outline-cyan"
        >
            ← Volver a Proyectos
        </a>
    </div>

</main>

<?php include __DIR__ . '/../includes/chatbot.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
