<?php
require 'GenericPartidoDAO.php';

class PartidoDAO extends GenericPartidoDAO
{

    const PARTIDOS_TABLE = 'partidos';
    const EQUIPOS_TABLE = 'equipos';

    // Obtiene todos los partidos de la base de datos
    public function selectAll()
    {
        $query = "SELECT idequipo1, idequipo2, resultado FROM " . self::PARTIDOS_TABLE;
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idequipo1, $idequipo2, $resultado);
        $partidos = array();
        while (mysqli_stmt_fetch($stmt)) {
            $partidos[] = array(
                'idequipo1' => $idequipo1,
                'idequipo2' => $idequipo2,
                'resultado' => $resultado
            );
        }

        return $partidos;
    }

    // Obtiene los partidos de un equipo específico por su ID
    public function selectById($id)
    {
        $query = "SELECT id, idEquipo1, idEquipo2, resultado, jornada FROM " . self::PARTIDOS_TABLE . " WHERE idEquipo1 = ? OR idEquipo2 = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $id, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $idequipo1, $idequipo2, $resultado, $jornada);

        $partidos = array();
        while (mysqli_stmt_fetch($stmt)) {
            $partidos[] = array(
                'id' => $id,
                'idequipo1' => $idequipo1,
                'idequipo2' => $idequipo2,
                'resultado' => $resultado,
                'jornada' => $jornada
            );
        }

        return $partidos;
    }

    // Obtiene todas las jornadas disponibles ordenadas ascendentemente
    public function selectJornadas()
    {
        $query = "SELECT DISTINCT jornada FROM " . self::PARTIDOS_TABLE . " ORDER BY jornada ASC";
        $stmt = mysqli_prepare($this->conn, $query);
        $result = mysqli_query($this->conn, $query);
        $jornadas = array();
        while ($partidoBD = mysqli_fetch_array($result)) {
            $jornadas[] = array(
                'jornada' => $partidoBD["jornada"],
            );
        }
        return $jornadas;
    }

    // Obtiene los partidos de una jornada específica
    public function selectPartidosByJornada($jornada)
    {
        $query = "SELECT idequipo1, idequipo2, resultado FROM " . self::PARTIDOS_TABLE . " WHERE jornada=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $jornada);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idequipo1, $idequipo2, $resultado);

        $partidos = array();
        while (mysqli_stmt_fetch($stmt)) {
            $partidos[] = array(
                'idequipo1' => $idequipo1,
                'idequipo2' => $idequipo2,
                'resultado' => $resultado
            );
        }

        return $partidos;
    }

    // Obtiene la jornada de un partido específico
    public function selectJornadabyPartido($partido)
    {
        $query = "SELECT DISTINCT jornada FROM " . self::PARTIDOS_TABLE . " WHERE id=? ORDER BY jornada ASC";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $partido);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $jornada);

        while (mysqli_stmt_fetch($stmt)) {
            $jornadas[] = array(
                'jornada' => $jornada
            );
        }

        return $jornadas;
    }

    // Inserta un nuevo partido con resultado aleatorio
    public function insert($idequipo1, $idequipo2, $jornada)
    {
        $opciones = ['1', 'X', '2'];
        $resultado = $opciones[array_rand($opciones)];
        $query = "INSERT INTO " . self::PARTIDOS_TABLE .
            " (idequipo1, idequipo2, resultado, jornada) VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'iisi', $idequipo1, $idequipo2, $resultado, $jornada);
        return $stmt->execute();
    }

}
