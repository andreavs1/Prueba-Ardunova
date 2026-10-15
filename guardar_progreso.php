<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 0);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'mensaje' => 'Método no permitido.']);
    exit();
}

if (!isset($_SESSION['id_usuario'])) {
    http_response_code(401);
    echo json_encode(['ok' => false, 'mensaje' => 'No autorizado. Iniciá sesión de nuevo.']);
    exit();
}

require __DIR__ . '/conexion.php';

$id_usuarios = (int) $_SESSION['id_usuario'];
$id_tutorial = (int) ($_POST['id_tutorial'] ?? 0);

if ($id_tutorial < 1 || $id_tutorial > 24) {
    echo json_encode(['ok' => false, 'mensaje' => 'ID de tutorial inválido.']);
    exit();
}

try {
    $stmt = $conn->prepare(
        'INSERT INTO progreso (id_usuarios, id_tutorial, completado)
         VALUES (?, ?, 1)
         ON DUPLICATE KEY UPDATE completado = 1'
    );
    $stmt->bind_param('ii', $id_usuarios, $id_tutorial);
    $stmt->execute();
    echo json_encode(['ok' => true]);
} catch (Exception $e) {
    error_log($e->getMessage());
    echo json_encode(['ok' => false, 'mensaje' => 'No se pudo guardar el progreso.']);
}
