<?php
// Calcula la URL base del sitio automáticamente.
if (!defined('BASE_URL')) {
    $raiz = str_replace('\\', '/', (string) realpath(__DIR__ . '/..'));
    $doc  = str_replace('\\', '/', (string) realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));
    $ruta = ($doc !== '' && strpos($raiz, $doc) === 0) ? substr($raiz, strlen($doc)) : '';
    define('BASE_URL', rtrim($ruta, '/') . '/');
}
