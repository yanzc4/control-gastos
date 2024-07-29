<?php
session_start();
session_destroy();

setcookie('sesion', '', time() - 3600, '/');

header("location: ../");
exit();