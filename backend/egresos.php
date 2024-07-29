<?php
require_once('../inc/conexion.php');
session_start();

function listar()
{
    $conexion = conectar();
    $userid = $_SESSION['userid'];
    $sql = "select * from egresos where usuario = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    ?>
    <div class="max-w-lg w-full bg-white rounded-lg px-4 md:p-6">

        <div class=" sticky z-50 top-0 bg-white">
            <div class="flex justify-between pb-4 pt-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Egresos</h5>
                </div>
                <div>
                    <h5 class="leading-none text-lg font-bold text-red-500 pb-1">Ver Todos</h5>
                </div>
            </div>
        </div>

        <?php while ($row = $resultado->fetch_assoc()) { ?>
            <div class="swiper border-b mb-3 border-gray-200">
                <div class="swiper-wrapper pb-3">
                    <div class="swiper-slide menu">
                        <button onclick="eliminarEgreso('<?php echo $row['id']; ?>')" class="w-10 h-10 rounded-lg bg-red-100 text-red-900 hover:bg-red-200 focus:bg-red-200 flex items-center justify-center me-3 text-2xl">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="swiper-slide content">

                        <div class=" menu-button flex justify-between">
                            <div class="flex items-center">
                                <div>
                                    <h5 class="leading-none text-md font-bold text-gray-900 dark:text-white pb-1"><?php echo $row['detalle']; ?></h5>
                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400"><?php echo $row['fecha']; ?></p>
                                </div>
                            </div>
                            <div>
                                <h5 class="leading-none text-md font-bold text-gray-900 pb-1">S./<?php echo $row['dinero']; ?></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        } ?>
        
    </div>
<?php
}

function insert(){
    if ($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']) {
        if ($_POST['detalle'] != "" && $_POST['dinero'] != "" && $_POST['fecha'] != "") {
            $conexion = conectar();
            $userid = $_SESSION['userid'];
            $detalle = $_POST['detalle'];
            $dinero = $_POST['dinero'];
            $fecha = $_POST['fecha'];
            $sql = "insert into egresos (detalle, fecha, dinero, usuario, estado) values (?, ?, ?, ?, 1)";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "ssdi", $detalle, $fecha, $dinero, $userid);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo json_encode(array('response' => 'success', 'message' => 'Egreso registrado correctamente'));
            } else {
                echo json_encode(array('response' => 'error', 'message' => 'Error al registrar el egreso'));
            }
        } else {
            echo json_encode(array('response' => 'error', 'message' => 'Faltan datos'));
        }
    } else {
        echo json_encode(array('response' => 'error', 'message' => 'Error de token'));
    }
}

function delete(){
    if($_POST['token'] != "" && $_POST['token'] == $_SESSION['token']){
        if($_POST['id'] != ""){
            $conexion = conectar();
            $id = $_POST['id'];
            $userid = $_SESSION['userid'];
            $sql = "delete from egresos where id = ? and usuario = ?";
            $stmt = mysqli_prepare($conexion, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $id, $userid);
            mysqli_stmt_execute($stmt);
            if(mysqli_stmt_affected_rows($stmt) > 0){
                echo json_encode(array('response' => 'success', 'message' => 'Egreso eliminado correctamente'));
            }else{
                echo json_encode(array('response' => 'error', 'message' => 'Error al eliminar el egreso'));
            }
        }else{
            echo json_encode(array('response' => 'error', 'message' => 'Faltan datos'));
        }
    }else{
        echo json_encode(array('response' => 'error', 'message' => 'Error de token'));
    }
}

if (function_exists($_GET['f'])) {
    $_GET['f'](); //llama la función si es que existe
}
