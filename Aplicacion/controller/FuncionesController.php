<?php
// controller/FuncionesController.php
include_once(__DIR__ . '/../model/Funciones.php');

class FuncionesController {
    private $funciones;

    public function __construct() {
        $this->funciones = new Funciones();
    }

    public function obtenerConfiguracion() {
        return $this->funciones->obtenerConfiguracion();
    }
}

?>

