<?php

require_once('../templates/header.php');
require_once('../utils/SessionHelper.php');

// Verifica si existe un partido en la sesión para cerrarla
if (isset($_SESSION['partido'])) {
    SessionHelper::destroySession();
    header('Location: equipos.php');
    exit();
} else {
    echo "<div class='main'><br>" .
         "No puedes salir de sesión porque no estás registrado</div>";
}
?>
