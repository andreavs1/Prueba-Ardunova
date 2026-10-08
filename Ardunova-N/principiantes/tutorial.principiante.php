<?php session_start(); $active_page = 'tutoriales'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutoriales Básico - ARDUNOVA</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Contenedor dinámico cargado por JavaScript -->
    <main id="app-tutorial">
        <div class="d-flex justify-content-center align-items-center py-5 style="min-height: 50vh;">
            <div class="spinner-border text-info" role="status">
                <span class="visually-hidden">Cargando tutorial...</span>
            </div>
        </div>
    </main>

    <!-- Archivo JS único (misma carpeta) -->
    <script src="tutoriales.js"></script>
</body>
</html>