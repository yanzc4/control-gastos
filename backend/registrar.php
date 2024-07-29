<?php
session_start();
if ($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']) {
    if ($_POST["nombre"] != "" && $_POST["correo"] != "" && $_POST["pass"] != "") {

        $nombre = $_POST['nombre'];
        $email = $_POST['correo'];
        $pass = $_POST['pass'];
        $estado = 1;

        //validamos el correo
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 3;
            exit();
        }

        //validamos la contraseña
        if (strlen($pass) < 8) {
            echo 4;
            exit();
        }


        //conexion
        require_once('../inc/conexion.php');
        $con = conectar();


        //antes de ejecutar verificamos si el correo ya existe
        $sql2 = "select * from usuarios where correo = ?";
        $stmt2 = mysqli_prepare($con, $sql2);
        mysqli_stmt_bind_param($stmt2, "s", $email);
        mysqli_stmt_execute($stmt2);
        $resultado = mysqli_stmt_get_result($stmt2);
        if ($fila = $resultado->fetch_assoc()) {
            //cerramos la consulta preparada
            mysqli_stmt_close($stmt2);
            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            echo 2;
        } else {
            //cerramos la consulta preparada
            mysqli_stmt_close($stmt2);

            // Consulta preparada para prevenir inyección SQL
            $sql = "insert into usuarios (nombre, correo, pass, estado) values (?,?,?,1)";

            // Preparar la consulta
            $stmt = mysqli_prepare($con, $sql);

            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, "sss", $nombre, $email, $pass);

            // Ejecutar la consulta
            mysqli_stmt_execute($stmt);

            // Cerrar la consulta preparada
            mysqli_stmt_close($stmt);

            // Cerrar la conexión a la base de datos
            mysqli_close($con);
            echo 1;
        }
    } else {
        echo 5;
    }
} else {
    echo 0;
}
