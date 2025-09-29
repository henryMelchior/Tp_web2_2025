<?php
require_once './app/pagos.php';
// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar';
if (!empty($_GET['action'])){
    $action = $_GET['action'];
}




$params = explode('/',$action);

switch ($params[0]){
    case "listar":
        mostrarPagos();
        break;
    case"guardar":
        registrarPago();
        break;
    default:
        echo('404 pagina no encontrada');
        break;
}
