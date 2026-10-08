<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04 - Mi Primer Programa: Blink | Ardunova</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
     <?php include __DIR__ . '/includes/header.php'; ?>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="/Ardunova-N/assets/img/logo.jpg" alt="Logo de ARDUNOVA" class="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tutoriales.php">Tutoriales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="proyectos.php">Proyectos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="recursos.php">Recursos</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="comunidad.php">Comunidad</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Contenedor dinámico de la lección -->
    <main id="app-tutorial"></main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script ejecutor -->
    <script src="tutorial4.js"></script>

        <footer class="main-footer mt-auto">
        <div class="container py-4">
            <div class="footer-bottom mt-0 pt-3">
                <p class="mb-0 text-center">&copy; 2026 ARDUNOVA. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include __DIR__ . '/includes/footer.php'; ?>

</body>
</html>