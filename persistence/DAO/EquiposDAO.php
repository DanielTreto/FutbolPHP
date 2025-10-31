<?php
require 'GenericEquiposDAO.php';

class EquiposDAO extends GenericEquiposDAO
{

  const EQUIPOS_TABLE = 'equipos';

  // Obtiene todos los equipos de la base de datos
  public function selectAll()
  {
    $query = "SELECT * FROM " . EquiposDAO::EQUIPOS_TABLE;
    $result = mysqli_query($this->conn, $query);
    $equipos = array();
    while ($equipoBD = mysqli_fetch_array($result)) {
      $equipo = array(
        'id' => $equipoBD["id"],
        'nombre' => $equipoBD["nombre"],
        'estadio' => $equipoBD["estadio"],
        'imagen' => $equipoBD["imagen"]
      );
      array_push($equipos, $equipo);
    }
    return $equipos;
  }


  // Inserta un nuevo equipo en la base de datos
  public function insert($nombre, $estadio, $imagen)
  {
    $query = "INSERT INTO " . EquiposDAO::EQUIPOS_TABLE .
      " (nombre, estadio, imagen) VALUES(?,?,?)";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $nombre, $estadio, $imagen);
    return $stmt->execute();
  }

  // Comprueba si existe un equipo con el nombre especificado
  public function checkExists($nombre)
  {
    $query = "SELECT nombre FROM " . EquiposDAO::EQUIPOS_TABLE . " WHERE nombre=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);

    mysqli_stmt_close($stmt);
    return ($count > 0);
  }

  // Obtiene un equipo por su ID
  public function selectById($id)
  {
    $query = "SELECT nombre, estadio, imagen FROM " . EquiposDAO::EQUIPOS_TABLE . " WHERE id=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nombre, $estadio, $imagen);
    $equipo = array();
    while (mysqli_stmt_fetch($stmt)) {
      $equipo = array(
        'nombre' => $nombre,
        'estadio' => $estadio,
        'imagen' => $imagen
      );
    }

    return $equipo;
  }
}
