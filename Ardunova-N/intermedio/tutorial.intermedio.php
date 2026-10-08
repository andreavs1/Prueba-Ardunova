<?php session_start(); $active_page = 'tutoriales'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Intermedio - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <main id="app-tutorial">
        <div class="d-flex justify-content-center align-items-center py-5" style="min-height: 50vh;">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Cargando tutorial...</span>
            </div>
        </div>
    </main>

    <script src="tutoriales.js"></script>
</body>
</html>