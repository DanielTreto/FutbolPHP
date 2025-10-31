<?php
require_once('utils/SessionHelper.php');

// Inicia la sesión si no está iniciada
SessionHelper::startSessionIfNotStarted();

// Redirecciona según si hay un partido en la sesión
if (!isset($_SESSION['partido'])) {
  header('Location: app/equipos.php');
  exit();
}else{
  header('Location: app/partidosEquipo.php');
  exit();
}

?>