<?php session_start(); $active_page = 'tutoriales'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Avanzado - ARDUNOVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

    <?php include __DIR__ . '/../includes/header.php'; ?>

    <main id="app-tutorial" class="py-4">
        <div class="d-flex justify-content-center align-items-center py-5" style="min-height: 50vh;">
            <div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Cargando tutorial avanzado...</span>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.bundle.min.js"></script>
    <script src="tutoriales.js?v=999"></script>
</body>
</html>