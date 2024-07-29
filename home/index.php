<?php
session_start();
require_once('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '../inc/.env');
$dotenv->safeLoad();

if (!isset($_SESSION['token'])) {
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
} else {
    $token = $_SESSION['token'];
}

//comprobar si ya inicio sesion
if (isset($_COOKIE['sesion'])) {
    $clave = $_ENV['KEY'];
    $method = "AES-256-ECB";
    //?desencriptar con openssl
    $decode = openssl_decrypt($_COOKIE['sesion'], $method, $clave);
    $decode = json_decode($decode, true);
    //?validar si existe id
    if (!isset($decode['id'])) {
        //borrar cookie 
        setcookie('sesion', '', time() - 3600, '/');
        header("Location: ../");
    }
} else {
    header("Location: ../");
}

$nombre = explode(" ",$decode['nombre']);
$nombre = ucfirst($nombre[0]);

if (!isset($_SESSION['userid'])) {
    $userid = $decode['id'];
    $_SESSION['userid'] = $userid;
} else {
    $userid = $_SESSION['userid'];
}
?>
<?php require_once('../layouts/components/headerHome.php') ?>
<input type="hidden" id="token" value="<?php echo $token; ?>">
<div id="conthome" class="relative z-40 w-full max-w-lg -translate-x-1/2 left-1/2 alto">
    <?php require_once('../layouts/home/home.php') ?>
</div>

<div id="contenido" class="hidden relative z-40 w-full max-w-lg -translate-x-1/2 left-1/2 alto">
</div>

<div id="notificacion" class=" fixed z-50 w-full p-2 top-0 start-0">
</div>

<?php require_once('../layouts/home/modalIngreso.php') ?>
<?php require_once('../layouts/home/modalEgreso.php') ?>
<?php require_once('../layouts/home/navigationBottom.php') ?>

<?php require_once('../layouts/components/footerHome.php') ?>