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

    include __DIR__ . '/conexion.php';
    if (!isset($conn) || !$conn) {
        throw new Exception('Error de conexión a la base de datos.');
    }

    $nombre_usuario = $_SESSION['usuario'];
    $stmt_user = $conn->prepare('SELECT id_usuarios FROM usuarios WHERE nombre = ? LIMIT 1');
    $stmt_user->bind_param('s', $nombre_usuario);
    $stmt_user->execute();
    $resultado_user = $stmt_user->get_result();

    if ($resultado_user->num_rows === 0) {
        echo json_encode(['ok' => false, 'mensaje' => 'Usuario no encontrado en la base de datos.']);
        exit();
    }

    $id_usuarios = $resultado_user->fetch_assoc()['id_usuarios'];
    
    // Recibe los datos enviados por JSON fetch o POST tradicional
    $input = json_decode(file_get_contents('php://input'), true);

    $id_tutorial = isset($input['id_tutorial']) ? intval($input['id_tutorial']) : (isset($_POST['id_tutorial']) ? intval($_POST['id_tutorial']) : 0);
    $id_proyecto = isset($input['id_proyecto']) ? intval($input['id_proyecto']) : (isset($_POST['id_proyecto']) ? intval($_POST['id_proyecto']) : 0);

    if ($id_tutorial > 0) {
        // Tutorial: id_tutorial tiene valor, id_proyecto se fuerza a NULL
        $stmt_progreso = $conn->prepare('
            INSERT INTO progreso (id_usuarios, id_tutorial, id_proyecto, completado)
            VALUES (?, ?, NULL, 1)
            ON DUPLICATE KEY UPDATE completado = 1
        ');
        $stmt_progreso->bind_param('ii', $id_usuarios, $id_tutorial);
    } elseif ($id_proyecto > 0) {
        // Proyecto: id_proyecto tiene valor, id_tutorial se fuerza a NULL
        $stmt_progreso = $conn->prepare('
            INSERT INTO progreso (id_usuarios, id_tutorial, id_proyecto, completado)
            VALUES (?, NULL, ?, 1)
            ON DUPLICATE KEY UPDATE completado = 1
        ');
        $stmt_progreso->bind_param('ii', $id_usuarios, $id_proyecto);
    } else {
        echo json_encode(['ok' => false, 'mensaje' => 'ID de tutorial o proyecto inválido.']);
        exit();
    }

    if (!$stmt_progreso) {
        throw new Exception('Error al preparar la consulta: ' . $conn->error);
    }

    if ($stmt_progreso->execute()) {
        echo json_encode(['ok' => true]);
    } else {
        throw new Exception('Error al guardar en la base de datos: ' . $stmt_progreso->error);
    }

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'mensaje' => $e->getMessage()]);
}