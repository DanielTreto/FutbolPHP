<?php
$dir = __DIR__;
$urlApp = "/FutbolPHP/";
require_once $dir . '/../utils/SessionHelper.php';

// Verifica si el usuario está logueado
$loggedin = SessionHelper::loggedin();
?>

<head>
  <meta charset="utf-8">
  <title>FútbolPHP</title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">

</head>



<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <button class="navbar-toggler navbar-toggler-right" type="button"
      data-toggle="collapse" data-target="#navbarTogglerDemo02"
      aria-controls="navbarToggler" aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand ms-3" href="../index.php">Fútbol</a>

    <div class="collapse navbar-collapse" id="navbarToggler">
      <ul class="navbar-nav mr-auto mt-2 mt-md-0">
        <li class="nav-item">
          <a class="nav-link" href="equipos.php">Equipos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="partidos.php">Partidos</a>
        </li>
        <?php
        // Muestra el botón de salir solo si el usuario está logueado
        if ($loggedin) {
          echo "<li class='nav-item'>";
          echo "<a class='nav-link' href='logout.php'>Salir</a>";
          echo "</li>";
        }
        ?>
      </ul>
    </div>
  </nav>
</body>

<script src="<?= $urlApp ?>assets/js/bootstrap.min.js"></script>