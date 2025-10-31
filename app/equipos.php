<?php
require_once('../templates/header.php');
require_once('../persistence/DAO/EquiposDAO.php');
require_once('../templates/plantillaEquipos.php');

$equiposDAO = new EquiposDAO();
$equipos =  $equiposDAO->selectAll();


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

</div>