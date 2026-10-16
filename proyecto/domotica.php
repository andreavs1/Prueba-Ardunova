
<?php
session_start();
$active_page = 'proyectos';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Automatización básica de luces y sensores para iniciarse en domótica.">

    <title>Domótica Básica - ARDUNOVA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<main class="container section-container">

    <div class="contenedor">

        <span class="tag-nivel intermedio">Intermedio</span>

        <h1 class="section-title">Domótica Básica</h1>

        <div class="row g-4 align-items-stretch">

            <div class="col-12 col-lg-7">

                <div class="project-info">

                    <h2>Sobre el proyecto</h2>

                    <p>
                        Automatización básica de luces y sensores para iniciarse
                        en el mundo de la domótica.
                    </p>

                    <h3>Objetivo</h3>

                    <p>
                        Comprender cómo conectar los componentes, programar la
                        placa Arduino y comprobar el funcionamiento paso a paso.
                    </p>

                </div>

            </div>

            <div class="col-12 col-lg-5">

                <div class="card h-100">

                    <div class="card-image">

                        <img src="../assets/img/domotica.jpg"
                             alt="Domótica Básica"
                             class="img-fluid rounded">

                        <img src="../assets/img/domotica1.png"
                             alt="Proyecto de Domótica Básica"
                             class="img-fluid rounded mt-3">

                    </div>

                </div>

            </div>

        </div>

        <section class="mt-5">

            <h2 class="mb-4">Pasos básicos</h2>

            <div class="row g-3">

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4">

                        <h4>1. Preparar</h4>

                        <p>
                            Reuní los componentes y verificá las conexiones
                            antes de alimentar el circuito.
                        </p>

                    </div>

                </div>

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4">

                        <h4>2. Programar</h4>

                        <p>
                            Cargá el sketch correspondiente y comprobá que la
                            placa seleccionada sea la correcta.
                        </p>

                    </div>

                </div>

                <div class="col-12 col-md-4">

                    <div class="setup-step p-4">

                        <h4>3. Probar</h4>

                        <p>
                            Ejecutá el proyecto y ajustá las conexiones o
                            parámetros si fuera necesario.
                        </p>

                    </div>

                </div>

            </div>

        </section>

        <div class="text-center button-container my-4">

            <a href="proyectos.php" class="btn btn-outline-cyan">
                ← Volver a Proyectos
            </a>

        </div>

    </div>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

