<?php
session_start();
require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, 'inc/.env');
$dotenv->safeLoad();

//comprobar si ya inicio sesion
if (isset($_COOKIE['sesion'])) {
    $clave = $_ENV['KEY'];
    $method = "AES-256-ECB";
    //?desencriptar con openssl
    $decode = openssl_decrypt($_COOKIE['sesion'], $method, $clave);
    $decode = json_decode($decode, true);
    //?validar si existe id
    if (isset($decode['id'])) {
        header('Location: home');
    } else {
        //borrar cookie 
        setcookie('sesion', '', time() - 3600, '/');
    }
}

if (!isset($_SESSION['token'])) {
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
} else {
    $token = $_SESSION['token'];
}
?>
<?php require_once('layouts/components/header.php') ?>
<div id="notificacion" class=" fixed z-50 top-2 right-2"></div>
<div>
    <input type="hidden" name="tk" id="tk" value="<?php echo $token; ?>">
    <?php require_once('layouts/principal/loginForm.php') ?>
    <?php require_once('layouts/principal/registerForm.php') ?>
</div>
<?php require_once('layouts/components/footer.php') ?>