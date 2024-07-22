<?php
include_once '../view/include/conexion.php';

class Propiedad {
    public static function obtenerTodasLasPropiedades() {
        include '../view/include/conexion.php';
        $query = "SELECT * FROM propiedades ORDER BY fecha_alta DESC";
        return mysqli_query($conn, $query);
    }

    public static function obtenerPropiedadPorId($id) {
        include '../view/include/conexion.php';
        $query = "SELECT * FROM propiedades WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    public static function realizarBusqueda($id_ciudad, $id_tipo, $estado) {
        include '../view/include/conexion.php';
        $query = "SELECT * FROM propiedades WHERE ciudad='$id_ciudad' AND tipo='$id_tipo' AND estado='$estado'";
        return mysqli_query($conn, $query);
    }

    // Agrega otros métodos según sea necesario
}
?>

