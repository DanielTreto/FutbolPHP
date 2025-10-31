<?php

require_once('../templates/header.php');
require_once('../persistence/DAO/PartidoDAO.php');
require_once('../persistence/DAO/EquiposDAO.php');
require_once('../templates/plantillaPartidos.php');

$partidoDAO = new PartidoDAO();
$equiposDAO = new EquiposDAO();
$equipos = $equiposDAO->selectAll();
$partidos = $partidoDAO->selectAll();
$jornadas = $partidoDAO->selectJornadas();

?>

<div class="container justify-content-center align-items-center">
    <?php
    pintarTitulo("Partidos");
    foreach ($jornadas as $jornada) {
        pintarJornada($jornada);
        $partidosJornada = $partidoDAO->selectPartidosByJornada($jornada['jornada']);
        foreach ($partidosJornada as $partido) {
            pintarPartido($equiposDAO, $partido);
        }
    }

    ?>

</div>