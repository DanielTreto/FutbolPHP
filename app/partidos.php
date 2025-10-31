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

// Verifica el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jornada = $_POST['jornada'];
    $equipo_local = $_POST['equipo_local'];
    $equipo_visitante = $_POST['equipo_visitante'];
    $insertar = true;

    // Comprueba que no se enfrenten el mismo equipo y la disponibilidad de los equipos en la jornada
    if ($equipo_local != $equipo_visitante) {
        $partidosJornada = $partidoDAO->selectPartidosByJornada($jornada);
        foreach ($partidosJornada as $partido) {
            if (
                $partido['idequipo1'] == $equipo_local || $partido['idequipo2'] == $equipo_local ||
                $partido['idequipo1'] == $equipo_visitante || $partido['idequipo2'] == $equipo_visitante
            ) {
                $insertar = false;
                echo "<script>alert(\"El equipo local o el equipo visitante ya tiene un partido en esta jornada\");</script>";
                break;
            }
        }
        if ($insertar) {
            $partidoDAO->insert($equipo_local, $equipo_visitante, $jornada);
            header("Location: partidos.php");
            exit;
        }
    } else {
        echo "<script>alert(\"El equipo local y el equipo visitante deben ser diferentes\");</script>";
    }
}

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

    <form class="form-horizontal m-5" role="form" method="POST" action="partidos.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Añade un partido</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="sr-only" for="nombre">Jornada:</label>
                    <select name="jornada" class="form-select mt-2 mb-3" id="jornadaSelect">
                        <?php
                        foreach ($jornadas as $jornada) {
                            echo "<option value='" . $jornada['jornada'] . "'>" . $jornada['jornada'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="sr-only" for="nombre">Equipo Local:</label>
                    <select name="equipo_local" class="form-select mt-2 mb-3" id="EquipoLocalSelect">
                        <?php

                        foreach ($equipos as $equipo) {
                            echo "<option value='" . $equipo['id'] . "'>" . $equipo['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="sr-only" for="nombre">Equipo Visitante:</label>
                    <select name="equipo_visitante" class="form-select mt-2 mb-3" id="EquipoVisitanteSelect">
                        <?php
                        foreach ($equipos as $equipo) {
                            echo "<option value='" . $equipo['id'] . "'>" . $equipo['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <!-- Botón de envío -->
        <div class="row" style="padding-top: 1rem">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Añadir
                </button>
            </div>
        </div>
    </form>
</div>