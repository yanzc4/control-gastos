<?php
require_once('../inc/conexion.php');
session_start();

function total()
{
    if ($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']) {
        $conexion = conectar();
        $userid = $_SESSION['userid'];
        $sql = "SELECT (SELECT COALESCE(SUM(dinero), 0) FROM ingresos WHERE usuario = $userid) as ingresos,
        (SELECT COALESCE(SUM(dinero), 0) FROM egresos WHERE usuario = $userid) as egresos,
        (SELECT COALESCE(SUM(dinero), 0) FROM ingresos WHERE usuario = $userid) - 
        (SELECT COALESCE(SUM(dinero), 0) FROM egresos WHERE usuario = $userid) AS total
        ";
        $resultado = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($resultado);
        $total = $row['total'];
        $ingresos = $row['ingresos'];
        $egresos = $row['egresos'];


        echo json_encode(array('response' => 'success', 'total' => $total, 'ingresos' => $ingresos, 'egresos' => $egresos));
    } else {
        echo json_encode(array('response' => 'error'));
    }
}

function data()
{
    if ($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']) {
        $conexion = conectar();
        $userid = $_SESSION['userid'];

        $sql = "SELECT 
        l.anio,
        l.mes,
        COALESCE(SUM(i.total_i_mes), 0) AS total_i_mes,
        COALESCE(SUM(e.total_e_mes), 0) AS total_e_mes
    FROM (
        SELECT YEAR(CURDATE()) AS anio, MONTH(CURDATE()) AS mes
        UNION ALL SELECT YEAR(CURDATE() - INTERVAL 1 MONTH) AS anio, MONTH(CURDATE() - INTERVAL 1 MONTH) AS mes
        UNION ALL SELECT YEAR(CURDATE() - INTERVAL 2 MONTH) AS anio, MONTH(CURDATE() - INTERVAL 2 MONTH) AS mes
        UNION ALL SELECT YEAR(CURDATE() - INTERVAL 3 MONTH) AS anio, MONTH(CURDATE() - INTERVAL 3 MONTH) AS mes
        UNION ALL SELECT YEAR(CURDATE() - INTERVAL 4 MONTH) AS anio, MONTH(CURDATE() - INTERVAL 4 MONTH) AS mes
        UNION ALL SELECT YEAR(CURDATE() - INTERVAL 5 MONTH) AS anio, MONTH(CURDATE() - INTERVAL 5 MONTH) AS mes
    ) AS l
    LEFT JOIN (
        SELECT YEAR(fecha) AS anio, MONTH(fecha) AS mes, SUM(dinero) AS total_i_mes
        FROM ingresos
        WHERE usuario = $userid
        GROUP BY anio, mes
    ) AS i ON l.anio = i.anio AND l.mes = i.mes
    LEFT JOIN (
        SELECT YEAR(fecha) AS anio, MONTH(fecha) AS mes, SUM(dinero) AS total_e_mes
        FROM egresos
        WHERE usuario = $userid
        GROUP BY anio, mes
    ) AS e ON l.anio = e.anio AND l.mes = e.mes
    GROUP BY l.anio, l.mes
    ORDER BY l.anio ASC, l.mes ASC
    LIMIT 6;
    ";

        $resultado = mysqli_query($conexion, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($resultado)) {
            //?hacer un switch para los meses
            switch ($row['mes']) {
                case 1:
                    $row['mes'] = "Ene";
                    break;
                case 2:
                    $row['mes'] = "Feb";
                    break;
                case 3:
                    $row['mes'] = "Mar";
                    break;
                case 4:
                    $row['mes'] = "Abr";
                    break;
                case 5:
                    $row['mes'] = "May";
                    break;
                case 6:
                    $row['mes'] = "Jun";
                    break;
                case 7:
                    $row['mes'] = "Jul";
                    break;
                case 8:
                    $row['mes'] = "Ago";
                    break;
                case 9:
                    $row['mes'] = "Sep";
                    break;
                case 10:
                    $row['mes'] = "Oct";
                    break;
                case 11:
                    $row['mes'] = "Nov";
                    break;
                case 12:
                    $row['mes'] = "Dic";
                    break;
            }
            //?agregar al array
            array_push($data, $row);
        }
        echo json_encode(array('response' => 'success', 'data' => $data));
    } else {
        echo json_encode(array('response' => 'error', 'message' => 'Error de token'));
    }
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
