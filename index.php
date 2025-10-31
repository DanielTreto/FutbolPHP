<?php
require_once('utils/SessionHelper.php');

SessionHelper::startSessionIfNotStarted();
if (!isset($_SESSION['partido'])) {
  header('Location: app/equipos.php');
  exit();
}else{
  header('Location: app/partidosEquipo.php');
  exit();
}

?>