<?php

require_once('../templates/header.php');
require_once('../utils/SessionHelper.php');

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['partido'])) {
    SessionHelper::destroySession();
    header('Location: equipos.php');
    exit();
} else {
    echo "<div class='main'><br>" .
         "No puedes salir de sesión porque no estás registrado</div>";
}
?>
