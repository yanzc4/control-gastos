<?php
require_once('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../inc/.env');
$dotenv->safeLoad();
session_start();
if ($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']) {
    if ($_POST["email"] != "" && $_POST["pass"] != "") {

        $user = $_POST['email'];
        $pass = $_POST['pass'];

        //conexion
        require_once('../inc/conexion.php');
        $con = conectar();

        // Consulta preparada para prevenir inyección SQL
        $sql = "select * from usuarios where correo = ? and pass = ? and estado = 1";

        // Preparar la consulta
        $stmt = mysqli_prepare($con, $sql);

        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, "ss", $user, $pass);

        // Ejecutar la consulta
        mysqli_stmt_execute($stmt);

        // Obtener el resultado
        $resultado = mysqli_stmt_get_result($stmt);

        if ($row = $resultado->fetch_assoc()) {

            //?clave para encriptar
            $clave = $_ENV['KEY'];
            $method = "AES-256-ECB";

            //?array de datos
            $data = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'correo' => $row['correo'],
            );

            echo 1;

            $data = json_encode($data, true);
            //?encriptar con openssl
            $data = openssl_encrypt($data, $method, $clave);
            //?crear cookie
            setcookie("sesion", $data, time() + 60 * 60 * 24 * 30, "/", "", false, true);

            //?cerramos la consulta preparada
            mysqli_stmt_close($stmt);
            //? Cerrar la conexión a la base de datos
            mysqli_close($con);
            
        } else {
            //cerramos la consulta preparada
            mysqli_stmt_close($stmt);
            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            echo 2;
        }
    } else {
        echo 3;
    }
} else {
    echo 0;
}
