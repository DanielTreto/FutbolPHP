<?php
require_once('../templates/header.php');
require_once('../persistence/DAO/EquiposDAO.php');
require_once('../utils/SessionHelper.php');
require_once('../templates/plantillaEquipos.php');

$equiposDAO = new EquiposDAO();
$equipos =  $equiposDAO->selectAll();

// Verifica el envío del formulario para añadir un nuevo equipo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $estadio = trim($_POST['estadio']);
    $imagen = trim($_POST['imagen']);

    // Comprueba si ya existe un equipo con ese nombre
    if ($equiposDAO->checkExists($nombre)) {
        ?>
        <div class="container mt-4">
            <div class="alert alert-warning" role="alert">
                Error: Ya existe un equipo con ese nombre
            </div>
        </div>
        <?php
    } else {
        $equiposDAO->insert($nombre, $estadio, $imagen);
        header("Location: equipos.php");
        exit;
    }
}

// Verifica si se ha seleccionado un equipo para ver sus partidos
if (isset($_GET['id'])) {
    SessionHelper::setSession($_GET['id']);
    header("Location: partidosEquipo.php?id=" . $_GET['id']);
    exit;
}


?>
<div class="container">

    <div class="row align-items-center justify-content-center">
        <?php
        pintarTitulo("Equipos");
        foreach ($equipos as $equipo) {
            pintarEquipoCard($equipo, true, 'text-start', 25, true);
        }
        ?>
    </div>

    <form class="form-horizontal m-5" role="form" method="POST" action="equipos.php">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Añade un equipo</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <label class="sr-only" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control mt-2 mb-3"
                        id="nombre"
                        placeholder="Ej: Real Madrid" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-only" for="estadio">Estadio:</label>
                    <input type="text" name="estadio" class="form-control mt-2 mb-3"
                        id="estadio"
                        placeholder="Ej: Santiago Bernabéu" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="sr-only" for="imagen">URL del escudo:</label>
                    <input type="url" name="imagen" class="form-control mt-2 mb-3"
                        id="imagen"
                        placeholder="Ej: https://upload.wikimedia.org/escudo_real_madrid.png" required>
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