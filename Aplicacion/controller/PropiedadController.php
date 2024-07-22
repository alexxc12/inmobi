<?php
// controller/PropiedadController.php
include_once(__DIR__ . '/../model/Propiedad.php');

class PropiedadController {
    private $propiedad;

    public function __construct() {
        $this->propiedad = new Propiedad();
    }

    public function obtenerPropiedadPorId($id) {
        return $this->propiedad->obtenerPropiedadPorId($id);
    }
}

?>

