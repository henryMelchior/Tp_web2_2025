<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calculadora.php" method="get">
        <label for="">Ingrese primer numero</label>
        <input type="number" name="num1" id="dinero">
        <label for="">Ingrese segundo numero</label>
        <input type="number" name="num2" id="interes">
        <select name="operador">
            <option value="suma">+</option>
            <option value="resta">-</option>
            <option value="division">/</option>
            <option value="multiplicacion">x</option>
        </select>
        <button type="submit">calcular</button>
    </form>
    <?php

if (
    isset($_GET["num1"], $_GET["num2"], $_GET["operador"]) &&
    is_numeric($_GET["num1"]) &&
    is_numeric($_GET["num2"])
) {
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $operador = $_GET["operador"];

    switch ($operador) {
        case "suma":
            $res = $num1 + $num2;
            echo $res;
            break;
        case "division":
            division($num1, $num2);
            break;
        case "resta":
            $res = $num1 - $num2;
            echo $res;
            break;
        case "multiplicacion":
            $res = $num1 * $num2;
            echo $res;
            break;
        default:
            echo "Operador inválido";
    }
} else {
    echo "Faltan ingresar datos válidos.";
}

function division($num1, $num2) {
    if ((float)$num2 != 0) {
        $res = $num1 / $num2;
        echo $res;
    } else {
        echo "No se puede dividir por 0";
    }
}
?>

    
</body>
</html>