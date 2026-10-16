<?php
session_start();
$active_page = 'tutoriales';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>1. ¿Qué es Arduino? - ARDUNOVA</title>
    
    <!-- Bootstrap 5 CSS y estilos del proyecto -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">

<?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Contenedor donde JavaScript inyectará todo el contenido -->
<main id="app-tutorial"></main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<!-- Scripts de Bootstrap y lógica interactiva -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="tutorial1.js"></script>
</body>
</html>