<?php
require_once('../persistence/DAO/EquiposDAO.php');
require_once('../persistence/DAO/PartidoDAO.php');
require_once('../utils/SessionHelper.php');
require_once('../templates/header.php');
require_once('../templates/plantillaPartidos.php');

$idpartido = $_SESSION['partido'] ?? header('Location: equipos.php');
$partidoDAO = new PartidoDAO();
$equiposDAO = new EquiposDAO();
$partidos = $partidoDAO->selectById($idpartido);
$equipo = $equiposDAO->selectById($idpartido);
?>

<div class="container justify-content-center align-items-center">
    <?php
    pintarTitulo("Partidos del " . $equipo['nombre']);
    foreach ($partidos as $partido) {
        pintarJornada($partido);
        pintarPartido($equiposDAO, $partido);
    }
    ?>
</div>