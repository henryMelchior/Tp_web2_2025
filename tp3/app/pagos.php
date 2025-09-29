<?php
require_once './app/db.php';
function mostrarPagos(){
    require_once './templates/header.php';
    $pagos = getPagos();
    require_once './templates/pagos_list.php';
    require_once './templates/footer.php';

}
function registrarPago(){
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errores = [];

    // ✅ Verifico si existe y no está vacío
    if (!isset($_POST["deudor"]) || empty(trim($_POST["deudor"]))) {
        $errores[] = "El deudor es obligatorio.";
    } else {
        $deudor = trim($_POST["deudor"]);
    }

    if (!isset($_POST["cuota"]) || empty($_POST["cuota"])) {
        $errores[] = "La cuota es obligatoria.";
    } elseif (!is_numeric($_POST["cuota"]) || (int)$_POST["cuota"] <= 0) {
        $errores[] = "La cuota debe ser un número mayor que 0.";
    } else {
        $cuota = (int)$_POST["cuota"];
    }

    if (!isset($_POST["cuota_capital"]) || empty($_POST["cuota_capital"])) {
        $errores[] = "El monto es obligatorio.";
    } elseif (!is_numeric($_POST["cuota_capital"]) || (float)$_POST["cuota_capital"] <= 0) {
        $errores[] = "El monto debe ser un número mayor que 0.";
    } else {
        $cuota_capital = (float)$_POST["cuota_capital"];
    }

    if (!isset($_POST["fecha_pago"]) || empty($_POST["fecha_pago"])) {
        $errores[] = "La fecha es obligatoria.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["fecha_pago"])) {
        $errores[] = "La fecha no es válida.";
    } else {
        $fecha_pago = $_POST["fecha_pago"];
    }

    if (!empty($errores)) {
        foreach ($errores as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    // Si no hubo errores, inserto
    insertPago( $deudor, $cuota, $cuota_capital, $fecha_pago);
    }
}


