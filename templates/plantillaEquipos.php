<?php
// Crea una card con la información y escudo del equipo
function pintarEquipoCard($equipo, $imgAlineacion , $alineacion, $width, $boton)
{
    echo "<div class='card m-2 d-flex flex-row align-items-center' style='width: {$width}rem;'>";
    if ($imgAlineacion) {
        echo "<img src='" . $equipo['imagen'] . "' class='img-fluid rounded-start' alt='Escudo' style='width:80px; height:80px; object-fit:contain; margin:10px;'>";
    }
    echo "<div class='card-body $alineacion'>";
    echo "<h5 class='card-title mb-1'>" . $equipo['nombre'] . "</h5>";
    echo "<p class='card-text mb-2 text-muted'>" . $equipo['estadio'] . "</p>";
    if ($boton) {
        echo "<a href='?id=" . $equipo['id'] . "' class='btn btn-primary btn-sm'>Ver partidos</a>";
    }
    echo "</div>";
    if (!$imgAlineacion) {
        echo "<img src='" . $equipo['imagen'] . "' class='img-fluid rounded-start' alt='Escudo' style='width:80px; height:80px; object-fit:contain; margin:10px;'>";
    }
    echo "</div>";
}

// Genera un título con una línea horizontal debajo
function pintarTitulo($texto){
    echo "<div class='col-md-12'>";
    echo "<h2>$texto</h2>";
    echo "<hr>";
    echo "</div>";
}