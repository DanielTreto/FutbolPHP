<?php
require 'GenericEquiposDAO.php';

class EquiposDAO extends GenericEquiposDAO {

  //Se define una constante con el nombre de la tabla
  const EQUIPOS_TABLE = 'equipos';

  public function selectAll() {
    $query = "SELECT * FROM " . EquiposDAO::EQUIPOS_TABLE;
    $result = mysqli_query($this->conn, $query);
    $users= array();
    while ($userBD = mysqli_fetch_array($result)) {
      $user = array(
        'id' => $userBD["id"],
        'nombre' => $userBD["nombre"],
        'estadio' => $userBD["estadio"],
        'imagen' => $userBD["imagen"]
      );
      array_push($users, $user);
    }
    return $users;
  }



  public function insert($nombre, $estadio, $imagen) {
    $query = "INSERT INTO " . EquiposDAO::EQUIPOS_TABLE .
      " (nombre, estadio, imagen) VALUES(?,?,?)";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $nombre, $estadio, $imagen);
    return $stmt->execute();
  }

  public function checkExists($nombre) {
    $query = "SELECT nombre FROM " . EquiposDAO::EQUIPOS_TABLE . " WHERE nombre=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $nombre);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_store_result($stmt);
    $count = mysqli_stmt_num_rows($stmt);

    mysqli_stmt_close($stmt);
    return ($count > 0);
  }


  public function selectById($id) {
    $query = "SELECT nombre, estadio, imagen FROM " . EquiposDAO::EQUIPOS_TABLE . " WHERE idUser=?";
    $stmt = mysqli_prepare($this->conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nombre, $estadio, $imagen);

    while (mysqli_stmt_fetch($stmt)) {
      $user = array(
 				'nombre' => $nombre,
 				'estadio' => $estadio,
 				'imagen' => $imagen
 		);
       }

    return $user;
  }

}

?>
