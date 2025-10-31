<?php
require_once('plantillaEquipos.php');

// Determina si un resultado está activo
function resultados($resultado, $txt)
{
    if ($resultado == $txt) {
        return 'active';
    }
    return '';
}

// Muestra los posibles resultados (1,X,2) junto con el estadio
function pintarResultados($resultado, $estadio)
{
    echo "<div class='d-flex flex-column justify-content-center align-items-center mx-5' style='width: 10rem;'>";
    echo "<ul class='list-group m-2 list-group-horizontal'>";
    foreach (['1', 'X', '2'] as $res) {
        echo "<li class='list-group-item " . resultados($resultado, $res) . "'>$res</li>";
    }
    echo "</ul>";
    echo "<p class='card-text mb-2 text-muted'>$estadio</p>";
    echo "</div>";
}

// Muestra el número de jornada con formato centrado
function pintarJornada($jornada)
{
    echo "<div class='text-center mt-4 mb-3'>";
    echo "<h3> Jornada " . $jornada['jornada'] . "</h3>";
    echo "</div>";
}

// Genera la vista de un partido mostrando los dos equipos y el resultado
function pintarPartido($equiposDAO, $partido)
{
    $equipo1 = $equiposDAO->selectById($partido['idequipo1']);
    $equipo2 = $equiposDAO->selectById($partido['idequipo2']);

    echo "<div class='d-flex justify-content-center align-items-center mb-2'>";
    pintarEquipoCard($equipo1, true, 'start', 20, false);
    pintarResultados($partido['resultado'], $equipo1['estadio']);
    pintarEquipoCard($equipo2, false, 'text-end', 20, false);
    echo "</div>";
}
