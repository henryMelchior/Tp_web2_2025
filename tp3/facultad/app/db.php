<?php
function getConnection() {
    return new PDO('mysql:host=localhost;dbname=db_facultad;charset=utf8', 'root', '');
}
function getMaterias(){
   $db=getConnection();
    // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
    $query = $db->prepare('SELECT * FROM materia');
    $query->execute();

    // 3. obtengo los resultados de la consulta
    $tasks = $query->fetchAll(PDO::FETCH_OBJ);

    return $tasks;

}
function insertPago($deudor,$cuota,$cuotaCapital,$fechaPago){
    $db=getConnection();
        // Verifico si ya existe
    $query = $db->prepare("SELECT COUNT(*) FROM pagos WHERE deudor = ? AND cuota = ?");
    $query->execute([$deudor, $cuota]);
    $existe = $query->fetchColumn();

    if ($existe > 0) {
        echo "Este pago ya fue registrado.";
    } else {
        // Insertar pago
        
        $query = $db->prepare("INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago)
                            VALUES (?, ?, ?, ?)");
        $query->execute([$deudor, $cuota, $cuotaCapital, $fechaPago]);
    }

}
