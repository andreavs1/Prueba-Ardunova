<?php
session_start();
if (!isset($_SESSION['usuario'])) { header('Location: login.php'); exit(); }
include 'conexion.php';

$nombre = $_SESSION['usuario'];

// Consultar datos del usuario
$stmt = $conn->prepare('SELECT id_usuarios, nombre, email FROM usuarios WHERE nombre = ? LIMIT 1');
$stmt->bind_param('s', $nombre);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();

if (!$usuario) { session_destroy(); header('Location: login.php'); exit(); }

$id_usuarios = $usuario['id_usuarios'];
$inicial = strtoupper(substr($usuario['nombre'], 0, 1));

$total_tutoriales = 0;
$total_proyectos = 0;
$ids_proyectos_completados = [];

// Contar tutoriales completados de forma segura
$stmt_count_t = $conn->prepare('SELECT COUNT(*) AS total FROM progreso WHERE id_usuarios = ? AND id_tutorial IS NOT NULL AND completado = 1');
if ($stmt_count_t) {
    $stmt_count_t->bind_param('i', $id_usuarios);
    $stmt_count_t->execute();
    $res_t = $stmt_count_t->get_result()->fetch_assoc();
    $total_tutoriales = $res_t['total'] ?? 0;
}

// Contar proyectos completados de forma segura
$stmt_count_p = $conn->prepare('SELECT COUNT(*) AS total FROM progreso WHERE id_usuarios = ? AND id_proyecto IS NOT NULL AND completado = 1');
if ($stmt_count_p) {
    $stmt_count_p->bind_param('i', $id_usuarios);
    $stmt_count_p->execute();
    $res_p = $stmt_count_p->get_result()->fetch_assoc();
    $total_proyectos = $res_p['total'] ?? 0;
}

// Obtener IDs de proyectos completados
$stmt_proyectos_user = $conn->prepare('SELECT id_proyecto FROM progreso WHERE id_usuarios = ? AND id_proyecto IS NOT NULL AND completado = 1');
if ($stmt_proyectos_user) {
    $stmt_proyectos_user->bind_param('i', $id_usuarios);
    $stmt_proyectos_user->execute();
    $res_proyectos_user = $stmt_proyectos_user->get_result();
    while ($row = $res_proyectos_user->fetch_assoc()) {
        $ids_proyectos_completados[] = (int)$row['id_proyecto'];
    }
}

// Leer proyectos.json usando ruta absoluta
$ruta_json = __DIR__ . '/proyectos.json';
$todos_los_proyectos = [];

if (file_exists($ruta_json)) {
    $proyectos_json = file_get_contents($ruta_json);
    $todos_los_proyectos = json_decode($proyectos_json, true) ?? [];
}

$proyectos_completados = array_filter($todos_los_proyectos, function($p) use ($ids_proyectos_completados) {
    return in_array((int)$p['id'], $ids_proyectos_completados);
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi perfil - ARDUNOVA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css?v=20261020-5">
</head>
<body>
<?php $active_page = ''; include 'includes/header.php'; ?>
<main class="perfil-page container my-4">
  <section class="perfil-header mb-4">
    <div class="row align-items-center g-3">
      <div class="col-12 col-md-auto"><div class="perfil-avatar"><?= htmlspecialchars($inicial) ?></div></div>
      <div class="col-12 col-md">
        <div class="perfil-info">
          <h1 class="h2 mb-1"><?= htmlspecialchars($usuario['nombre']) ?></h1>
          <p class="mb-2"><?= htmlspecialchars($usuario['email']) ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="row g-3 mb-4">
    <div class="col-12 col-md-6"><div class="resumen-card"><h3>Proyectos</h3><strong><?= $total_proyectos ?></strong><p>Proyectos realizados</p></div></div>
    <div class="col-12 col-md-6"><div class="resumen-card"><h3>Tutoriales</h3><strong><?= $total_tutoriales ?></strong><p>Tutoriales completados</p></div></div>
  </section>

  <section class="perfil-seccion mb-4">
    <div class="seccion-titulo d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
      <h2 class="h4 mb-0">Mi información</h2>
    </div>
    <div class="row g-3 mt-2">
      <div class="col-12 col-md-6"><div class="informacion-item"><span>Nombre</span><strong><?= htmlspecialchars($usuario['nombre']) ?></strong></div></div>
      <div class="col-12 col-md-6"><div class="informacion-item"><span>Correo electrónico</span><strong><?= htmlspecialchars($usuario['email']) ?></strong></div></div>
    </div>
  </section>

  <section class="perfil-seccion mb-4">
    <div class="seccion-titulo d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mb-3">
      <h2 class="h4 mb-0">Historial de proyectos</h2><a href="proyectos.php">Ver proyectos</a>
    </div>
    
    <?php if ($total_proyectos > 0): ?>
      <div class="row g-3">
        <?php foreach ($proyectos_completados as $proj): ?>
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm">
              <img src="<?= htmlspecialchars($proj['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($proj['titulo']) ?>">
              <div class="card-body">
                <span class="tag-nivel"><?= htmlspecialchars($proj['nivel']) ?></span>
                <h3 class="h5 mt-2"><?= htmlspecialchars($proj['titulo']) ?></h3>
                <p class="small"><?= htmlspecialchars($proj['descripcion']) ?></p>
                <a href="<?= htmlspecialchars($proj['enlace']) ?>" class="btn btn-sm btn-gradient">Ver proyecto</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="historial-vacio"><h3>Todavía no realizaste proyectos</h3><p>Cuando realices un proyecto, aparecerá acá.</p><a href="proyectos.php" class="btn btn-gradient">Explorar proyectos</a></div>
    <?php endif; ?>
  </section>

  <section class="perfil-seccion mb-4">
    <div class="seccion-titulo"><h2 class="h4 mb-0">Tutoriales completados</h2></div>
    <?php if ($total_tutoriales > 0): ?>
      <div class="alert alert-success mt-2">¡Felicitaciones! Has completado <?= $total_tutoriales ?> lección(es).</div>
    <?php else: ?>
      <div class="historial-vacio mt-2"><h3>No hay tutoriales completados</h3><p>Empezá un tutorial para verlo en tu historial.</p><a href="tutoriales.php" class="btn btn-gradient">Explorar tutoriales</a></div>
    <?php endif; ?>
  </section>

  <div class="text-center my-4"><a href="logout.php" class="btn btn-outline-cyan">Cerrar sesión</a></div>
</main>
<?php include 'includes/chatbot.php'; ?>
<?php include 'includes/footer.php'; ?>
</body>
</html>