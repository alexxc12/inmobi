<?php
include_once '../view/include/conexion.php';

class Usuario {
    public static function login($usuario, $password) {
        include '../view/include/conexion.php';
        $query = "SELECT * FROM configuracion WHERE user='$usuario' AND password='$password'";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    // Agrega otros métodos según sea necesario
}
?>

