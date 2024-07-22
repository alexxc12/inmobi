<?php
include_once '../../controller/FuncionesController.php';
include_once '../../controller/PropiedadController.php';

$funcionesController = new FuncionesController();
$config = $funcionesController->obtenerConfiguracion();

$propiedadController = new PropiedadController();
$limInferior = 0;
$result_propiedades = $propiedadController->obtenerTodasLasPropiedades($limInferior);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAWPI - Inmobiliaria</title>
    <link rel="stylesheet" href="../../assets/css/estilo.css">
</head>
<body class="home" id="home">
    <div class="container">
        <?php include("../include/header.php"); ?>
        <h2>Casas, campos, departamentos. <br> Al mejor precio.</h2>
        <div class="box-buscar-propiedades pos-inferior">
            <div class="box-interior">
                <p>Encuentra la propiedad que busca</p>
                <form action="busqueda.php" method="get">
                    <select name="ciudad" id="">
                        <option value="">Seleccione Ciudad</option>
                        <?php while ($row = mysqli_fetch_assoc($result_ciudades)) : ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre_ciudad'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <select name="tipo" id="">
                        <option value="">Tipo de Propiedad</option>
                        <?php while ($row = mysqli_fetch_assoc($result_tipos)) : ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre_tipo'] ?></option>
                        <?php endwhile ?>
                    </select>
                    <div class="estado">
                        <span><input type="radio" value="Alquiler" name="estado" checked="true"> Alquiler</span>
                        <span><input type="radio" value="Venta" name="estado"> Venta</span>
                    </div>
                    <input type="submit" value="Buscar" name="buscar">
                </form>
            </div>
        </div>
        <h2 class="titulo-seccion">Propiedades Disponibles</h2>
        <div class="contenedor-propiedades" id="contenedor-propiedades">
            <?php while ($propiedad = mysqli_fetch_assoc($result_propiedades)) : ?>
                <div class="fila">
                    <form action="publicacion.php" method="get" id="<?php echo $propiedad['id'] ?>">
                        <input type="hidden" value="<?php echo $propiedad['id'] ?>" name="idPropiedad">
                        <div class="contenedor-propiedad" onclick="document.getElementById('<?php echo $propiedad['id'] ?>').submit();">
                            <div class="contenedor-img">
                                <img src="<?php echo 'admin/' . $propiedad['url_foto_principal'] ?>" alt="">
                                <div class="estado"><?php echo $propiedad['estado'] ?></div>
                            </div>
                            <div class="info">
                                <h2><?php echo $propiedad['titulo'] ?></h2>
                                <p><i class="fa-solid fa-location-pin"></i><?php echo $propiedad['ubicacion'] ?></p>
                                <span class="precio"><?php echo $propiedad['moneda']?> <?php echo number_format($propiedad['precio'],0,'','.')?></span>
                                <hr>
                                <table>
                                    <tr>
                                        <th>Ambientes</th>
                                        <th>Baños</th>
                                        <th>Dimensiones</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $propiedad['habitaciones'] ?></td>
                                        <td><?php echo $propiedad['banios'] ?></td>
                                        <td><?php echo $propiedad['dimensiones'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endwhile ?>
        </div>
        <button value="0" onclick="cargarMasPropiedades(this.value)" id="botonCargarMas">Ver Más</button>
        <?php include("../include/footer.php"); ?>
    </div>
</body>
<script src="../../assets/js/script.js"></script>
</html>

