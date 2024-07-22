<?php
session_start();

if (!isset($_SESSION['usuarioLogeado'])) {
    header("Location: login.php");
    exit();
}

include(__DIR__ . "/../includes/conexion.php");

$id_propiedad = $_GET['id'];
$query = "SELECT * FROM propiedades WHERE id='$id_propiedad'";
$resultado_propiedad = mysqli_query($conn, $query);
$propiedad = mysqli_fetch_assoc($resultado_propiedad);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Propiedad</title>
</head>
<body>
    <!-- Tu HTML aquí -->
</body>
</html>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/estilo.css">
    <title>SAWPI - Admin</title>
</head>
<body>
    <?php include("../include/header.php"); ?>
    <div id="contenedor-admin">
        <?php include("../include/contenedor-menu.php"); ?>
        <div class="contenedor-principal">
            <div id="detalle-propiedad">
                <h2>Detalle de Propiedad</h2>
                <hr>
                <div class="contenedor-tabla">
                    <h3>Descripción de la propiedad</h3>
                    <table class="descripcion">
                        <tr><td>ID de la Propiedad</td><td><?php echo $propiedad['id'] ?></td></tr>
                        <tr><td>Título de la Propiedad:</td><td><?php echo $propiedad['titulo'] ?></td></tr>
                        <tr><td>Descripción de la Propiedad</td><td><?php echo $propiedad['descripcion'] ?></td></tr>
                        <tr><td>Tipo de propiedad</td><td><?php echo obtenerTipo($propiedad['tipo']) ?></td></tr>
                        <tr><td>Elija estado de la propiedad</td><td><?php echo $propiedad['estado'] ?></td></tr>
                        <tr><td>Ubicación</td><td><?php echo $propiedad['ubicacion'] ?></td></tr>
                        <tr><td>Habitaciones</td><td><?php echo $propiedad['habitaciones'] ?></td></tr>
                        <tr><td>Baños</td><td><?php echo $propiedad['banios'] ?></td></tr>
                        <tr><td>Pisos</td><td><?php echo $propiedad['pisos'] ?></td></tr>
                        <tr><td>Garage</td><td><?php echo $propiedad['garage'] ?></td></tr>
                        <tr><td>Dimensiones</td><td><?php echo $propiedad['dimensiones'] ?></td></tr>
                        <tr><td>Precio (Alquiler o Venta)</td><td><?php echo $propiedad['moneda'] . " " . $propiedad['precio'] ?></td></tr>
                    </table>
                </div>
                <div class="contenedor-tabla">
                    <h3>Galería de Fotos</h3>
                    <table class="descripcion">
                        <tr><td>Foto Principal</td><td><img src="<?php echo $propiedad['url_foto_principal'] ?>" alt=""></td></tr>
                        <tr>
                            <td>Galería</td>
                            <td><?php $resultFotos = obtenerFotosGaleria($propiedad['id']); ?>
                                <?php while ($foto = mysqli_fetch_assoc($resultFotos)) : ?>
                                    <img src="fotos/<?php echo $propiedad['id'] . "/" . $foto['nombre_foto'] ?>">
                                <?php endwhile ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="contenedor-tabla">
                    <h3>Ubicación y Datos del propietario</h3>
                    <table class="descripcion">
                        <tr class="fila"><td><label for="pais">Pais</td><td><?php echo obtenerPais($propiedad['pais']) ?></td></tr>
                        <tr class="fila"><td>Ciudad</td><td><?php echo obtenerCiudad($propiedad['ciudad']) ?></td></tr>
                        <tr><td>Nombre del propietario</td><td><?php echo $propiedad['propietario'] ?></td></tr>
                        <tr><td>Teléfono del propietario</td><td><?php echo $propiedad['telefono_propietario'] ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
