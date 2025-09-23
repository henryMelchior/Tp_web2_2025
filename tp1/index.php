<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp1</title>
</head>
<body>
<!--¿Qué extensión debe tener la página?
    .PHP
    Lo que acabas de hacer: ¿Es una página dinámica o una página estática? ¿Cuál es la diferencia?
    es una pagina dinamica, server side rendering, El servidor envía el HTML completo o parcial del sitio
    ¿Por qué es necesario tener un servidor web para realizar esto?
    es el encargado de realizar, gestionar peticiones y de generar dinamicamente recursos que se envian al usuario
    procesan información que les llega del mismo (autenticación, formulario, upload archivos) 
    Esta funcionalidad permite el desarrollo de sistemas web completos
 -->
    <?php
        //arreglo indexado. acceso es mediante un indice
         $nombres=["juan","mariano","ramiro"];
         //arreglo asociativo, acceso es mediante clave valor
         $edades= [
                    "juan" => 35, 
                    "mariano" => 17, 
                    "ramiro" => 23 
         ];

    ?>
    <ul>
        <?php  
        foreach($nombres as $nombre){
            echo "<li> $nombre</li>";
            }
        
        ?>
    </ul>
    <?php
    // Procesar los datos enviados (si los hay)
    if (isset($_GET['listar'])) {
        $cantidad = $_GET['listar'];
        echo "<h2>Lista de $cantidad elementos:</h2>";
        echo "<ul>";
        for ($i = 1; $i <= $cantidad; $i++) {
            echo "<li>Elemento $i</li>";
        }
        echo "</ul>";
    }
    ?>

    <h1>Formulario con Enlaces como Botones</h1>

    <!-- Enlaces para listar elementos -->
    <a href="?listar=1">Listar 1</a><br>
    <a href="?listar=5">Listar 5</a><br>
    <a href="?listar=10">Listar 10</a><br>
    

    <form action="index.php" method="get">
        <input type="number" name="limite" id="limite">
        <button type="submit">Imprimir Tabla</button>
    </form>
    <?php 
        if(isset($_GET['limite'])){
            imprimirTabla($_GET['limite']);
        }
        function imprimirTabla($num){
            echo"<table>";
            imprimirEncabezado($num);
            generarTabla($num);
            echo"</table>";
        }
        function imprimirEncabezado($num){
            for($i=0;$i<=$num;$i++){
                    echo "<th>$i</th>";
            }
        }
        function generarTabla($num){
            for($i=1;$i<=$num;$i++){
                echo"<tr>";
                echo"<td>$i</td>";
                for($j=1;$j<=$num;$j++){
                    $res=$j*$i;
                    echo"<td>$res</td>";
                }
                echo"</tr>";
            }
        }
    ?>
    <h3>formulario GET</h3>
    <form action="index.php" method="get">
        <input type="text" name="nombre" id="nombre">
        <input type="text" name="apellido" id="apellido">
        <input type="number" name="edad" id="edad">
        <button type="submit">enviar</button>
    </form>
        <h3>formulario POST</h3>
    <form action="index.php" method="post">
        <input type="text" name="nombre" id="nombre">
        <input type="text" name="apellido" id="apellido">
        <input type="number" name="edad" id="edad">
        <label for="">masculino</label>
        <input type="radio" name="maculino" id="masculino">
        <label for="">femenino</label>
        <input type="radio" name="femenino" id="femenino">
        <label for="">pais</label>
        <select id="pais" name="pais">
            <option value="argentina">arg</option>
        </select>
        <label>
            <input type="checkbox" name="generos[]" value="rock"> Rock
        </label><br>
        <label>
            <input type="checkbox" name="generos[]" value="pop"> Pop
        </label><br>
        <label>
            <input type="checkbox" name="generos[]" value="clasica"> Clásica
        </label><br>
        <label>
            <input type="checkbox" name="generos[]" value="jazz"> Jazz
        </label><br>
        <label>
            <input type="checkbox" name="generos[]" value="hiphop"> Hip-Hop
        </label><br>
        <button type="submit">Enviar</button>
    </form>
        <button type="submit">enviar</button>
    </form>
    <?php
    $nombre   = null;
    $apellido = null;
    $edad     = null;
    if (!empty($_GET["nombre"])) {
    /* ------------ GET ------------ */
    if (isset($_GET["nombre"]) && !empty($_GET["nombre"])) {
        $nombre = $_GET["nombre"];
    } else {
        echo "<h1>Falta el nombre</h1>";
    }

    if (isset($_GET["apellido"]) && !empty($_GET["apellido"])) {
        $apellido = $_GET["apellido"];
    } else {
        echo "<h1>Falta el apellido</h1>";
    }

    if (isset($_GET["edad"]) && is_numeric($_GET["edad"])) {
        $edad = $_GET["edad"];
    } else {
        echo "<h1>Falta la edad o no es un número</h1>";
    }

    /* ------------ POST (sobrescribe si viene) ------------ */
 

    /* ------------ Mostrar resultados solo si todo está bien ------------ */

    // recién acá validás campo por campo
    }
    if(!empty($_POST["nombre"])){
        if (isset($_POST["nombre"]) && !empty($_POST["nombre"])) {
            $nombre = $_POST["nombre"];
    } else {
        echo "<h1>Falta el nombre</h1>";
    }

    if (isset($_POST["apellido"]) && !empty($_POST["apellido"])) {
        $apellido = $_POST["apellido"];
    } else {
        echo "<h1>Falta el apellido</h1>";
    }

    if (isset($_POST["edad"]) && is_numeric($_POST["edad"])) {
        $edad = $_POST["edad"];
    } else {
        echo "<h1>Falta la edad o no es un número</h1>";
    }
    }
    if (!empty($nombre) && !empty($apellido) && !empty($edad)) {
        echo "<h4>El nombre es: $nombre</h4>";
        echo "<h4>El apellido es: $apellido</h4>";
        echo "<h4>La edad es: $edad</h4>";
    }
    if (isset($_POST['generos'])) {
    $generosSeleccionados = $_POST['generos'];  // Esto será un array con los géneros seleccionados
    foreach ($generosSeleccionados as $genero) {
        echo "Género seleccionado: " . $genero . "<br>";
    }
}
    /*
    -Envíe el formulario usando los métodos POST y GET. ¿Cuál es la diferencia? ¿En qué situaciones considera mejor utilizar uno u el otro?
    la diferencia es que el metodo get evia los datos en la url, lo cual hace que sea muy vulnerable en algunos casos. el metodo post no, es funcional para contraseñas o datos sencibles
    -Investigue las diferencias entre los arreglos $_POST $_GET y $_REQUEST de PHP
    🔹 $_GET

    Contiene los datos enviados por método GET, es decir, los que van en la URL después del ?.

    Ejemplo:

    http://misitio.com/pagina.php?nombre=Henry&edad=25


    Accedés así:

    echo $_GET['nombre']; // Henry
    echo $_GET['edad'];   // 25


    Características:

    Se ven en la barra del navegador (no es seguro para datos sensibles como contraseñas).

    El tamaño está limitado (según el navegador/servidor).

    Es útil para enlaces, filtros de búsqueda, paginación, etc.

    🔹 $_POST

    Contiene los datos enviados por método POST, normalmente desde un formulario.

    Ejemplo:

    <form method="post" action="pagina.php">
        <input type="text" name="nombre">
        <input type="number" name="edad">
        <input type="submit" value="Enviar">
    </form>


    Y en pagina.php:

    echo $_POST['nombre'];
    echo $_POST['edad'];


    Características:

    No se muestran en la URL.

    Permite enviar mucha más información (no tiene límite práctico como GET).

    Es más seguro para contraseñas, datos privados, archivos, etc.

    No se puede compartir directamente con un enlace, a diferencia de GET.

    🔹 $_REQUEST

    Es un array combinado que junta datos de:

    $_GET

    $_POST

    $_COOKIE

    Ejemplo:

    echo $_REQUEST['nombre'];


    Va a buscar primero en POST, después en GET y luego en COOKIE (ese orden depende de la directiva variables_order de php.ini).

    Características:

    Es “cómodo” porque no tenés que preocuparte si vino por GET o POST.

    ⚠️ Pero es menos seguro y menos claro, porque no sabés de dónde vino el dato (puede ser confuso si llega en varios lados con valores distintos).

    En buenas prácticas modernas se evita $_REQUEST y se prefiere usar explícitamente $_GET o $_POST.
    -Genere validaciones de datos en el servidor. Ningún campo puede estar vacío. ¿Cuál es la diferencia entre realizar estas verificaciones del lado del cliente o del lado del servidor? 
    🔹 Validación del lado del cliente
    ✅ Ventajas:

    Respuesta rápida: el usuario recibe feedback inmediato sin esperar al servidor.

    Menos carga en el servidor (filtros simples los resuelve el navegador).

    Mejor experiencia de usuario (UX).

    ❌ Desventajas:

    No es segura: el usuario puede deshabilitar JavaScript, editar el HTML, usar herramientas como Postman, o modificar la request y mandar datos inválidos igual.

    Sirve solo como “primera barrera” o comodidad, nunca como garantía.
    🔹 Validación del lado del servidor
    ✅ Ventajas:

    Es segura, porque el cliente no puede saltársela (todo lo que llega a tu servidor se controla).

    Obligatoria cuando trabajás con datos críticos (contraseñas, pagos, base de datos, etc.).

    Protege de ataques como inyecciones SQL, XSS, etc.

    ❌ Desventajas:

    Más lenta para el usuario, porque hay que mandar la request al servidor y esperar la respuesta.

    Aumenta un poco la carga de procesamiento del servidor.
        


    Cada checkbox tiene el atributo name="generos[]". El uso de los corchetes ([]) indica que los valores seleccionados serán tratados como un array.

    Si el usuario selecciona, por ejemplo, "Rock" y "Jazz", los valores enviados serán un array con los elementos ["rock", "jazz"].

    En el servidor, podrás acceder a los valores como un array. 
    */


   
?>
    <form action="index.php" method="get">
        <label for="">ingrese el monto</label>
        <input type="number" name="dinero" id="dinero">
        <label for="">ingrese el interes</label>
        <input type="number" name="interes" id="interes">
        <button type="submit">calcular 12 meses</button>
    </form>
    <?php
        
        if(!empty($_GET["dinero"])&&!empty($_GET["interes"])){
            $dinero=null;
            $interes=null;
            if(isset($_GET["dinero"])&&is_numeric($_GET["dinero"])){
                $dinero=$_GET["dinero"];
            }else{
                echo"<h4>falta ingresar el dinero</h4>";
            }
            if(isset($_GET["interes"])&&is_numeric($_GET["interes"])){
                $interes=$_GET["interes"];
            }else{
                echo "<h4>falta ingresar el interes</h4>";
            }
            if(!empty($dinero)&&!empty($interes)){
                echo"aca";
                calcularInteres($dinero,$interes);
            }
            
           

        }
         function calcularInteres($dinero,$interes){
                $interes=$interes;
                echo"<h4>el monto inicial es $dinero</h4>";
                for($i=1;$i<=12;$i++){ 
                    $dinero+=($dinero*$interes)/100;
                    echo"<h4>el monto de el mes $i, es: $dinero </h4>";
                }
            }
       
    
    ?>
      

    
</body>
</html>