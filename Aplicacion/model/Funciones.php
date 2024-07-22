<?php
include_once '../view/include/conexion.php';
// model/Funciones.php
class Funciones {
    public function obtenerConfiguracion() {
        // Código para obtener la configuración
            include '../view/include/conexion.php';
            $query = "SELECT * FROM configuracion WHERE id='1'";
            $result = mysqli_query($conn, $query);
            return mysqli_fetch_assoc($result);
        }
    public function obtenerTodasLasCiudades() {
        // Código para obtener todas las ciudades
            include '../view/include/conexion.php';
            $query = "SELECT * FROM ciudades";
            return mysqli_query($conn, $query);
    }
   // Otras funciones...
   public static function obtenerTodosLosTipos() {
    include '../view/include/conexion.php';
    $query = "SELECT * FROM tipos";
    return mysqli_query($conn, $query);
    }
}
?>

