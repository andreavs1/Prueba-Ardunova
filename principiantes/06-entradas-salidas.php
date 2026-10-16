<?php
session_start();
$active_page = 'tutoriales';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6. Entradas y salidas - ARDUNOVA</title>
    
    <!-- Estilos generales y Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include __DIR__ . '/../includes/header.php'; ?>

<!-- Contenedor dinámico para la lección -->
<main id="app-tutorial"></main>

<?php include __DIR__ . '/../includes/footer.php'; ?>

<!-- Carga del contenido y la lógica en JavaScript -->
<script src="tutorial6.js"></script>
</body>
</html>