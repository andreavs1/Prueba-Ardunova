<?php
session_start();
header('Content-Type: application/json; charset=utf-8');

ini_set('display_errors', 0);
error_reporting(E_ALL);

try {
    if (!isset($_SESSION['usuario'])) {
        echo json_encode(['ok' => false, 'mensaje' => 'No autorizado. Iniciá sesión de nuevo.']);
        exit();
    }

    include DIR . '/conexion.php';
    if (!isset($conn) || !$conn) {
        throw new Exception('Error de conexión a la base de datos.');
    }

    $nombre_usuario = $_SESSION['usuario'];
    $stmt_user = $conn->prepare('SELECT id_usuarios FROM usuarios WHERE nombre = ? LIMIT 1');
    $stmt_user->bind_param('s', $nombre_usuario);
    $stmt_user->execute();
    $resultado_user = $stmt_user->get_result();

    if ($resultado_user->num_rows === 0) {
        echo json_encode(['ok' => false, 'mensaje' => 'Usuario no encontrado.']);
        exit();
    }

    $id_usuarios = $resultado_user->fetch_assoc()['id_usuarios'];
    $id_proyecto = isset($_POST['id_proyecto']) ? intval($_POST['id_proyecto']) : 0;

    if ($id_proyecto <= 0) {
        echo json_encode(['ok' => false, 'mensaje' => 'ID de proyecto inválido.']);
        exit();
    }

    // Insertar o actualizar el progreso del proyecto (id_tutorial quedará NULL por defecto o según tu diseño)
    $stmt_progreso = $conn->prepare('
        INSERT INTO progreso (id_usuarios, id_proyecto, completado)
        VALUES (?, ?, 1)
        ON DUPLICATE KEY UPDATE completado = 1
    ');

    if (!$stmt_progreso) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }

    $stmt_progreso->bind_param('ii', $id_usuarios, $id_proyecto);

    if ($stmt_progreso->execute()) {
        echo json_encode(['ok' => true]);
    } else {
        throw new Exception('Error al guardar en la base de datos: ' . $stmt_progreso->error);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => $e->getMessage()]);
}