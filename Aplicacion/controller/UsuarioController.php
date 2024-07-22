<?php
include_once(__DIR__ . '/../model/Usuario.php');

class UsuarioController {
    public function login($usuario, $password) {
        $user = new Usuario();
        return $user->login($usuario, $password);
    }
}
?>

