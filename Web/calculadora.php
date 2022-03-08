<?php session_start(); ?>
<?php 
$conn = include "conexion/conexion.php";

if(isset($_GET['fecha'])){
$fecha_consultar = $_GET['fecha'];
}else{
date_default_timezone_set('US/Central');  
$fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$nahual1 = $nahual[0];
$energia1 = $nahual[1];
$cholquij = $nahual[0]." ". strval($energia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">

                <div id='formulario'>
                    <h1>Calculadora</h1>
                    <form action="#" method="GET">
                        <div class="mb-1">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?>" >
                        </div>
                        <button type="submit" class="btn btn-get-started"><i class="far fa-clock"></i> Calcular</button>
                    </form>

                    <div id="tabla">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Calendario</th>
                                    <th scope="col" style="width: 30%;">Fecha</th>
                                    <th scope="col" style="width: 30%;">Referencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Calendario Haab</th>
                                    <td ><?php echo isset($haab[0]) ? $haab[0]." (".$haab[2].")" : ''; ?></td>
                                    <td>
                                    <?php 
                                    $stringPrint.=
                                    "<a href=\"models/paginaModeloElemento.php?elemento=uinal#".str_replace("'",'',$haab[1])."\"><img src=\"./imagenes/uinal/".$haab[1].".png\" width=\"50\" hspace=\"16\"></a>";
                                    $stringPrint.=
                                    "<a href=\"models/paginaModeloElemento.php?elemento=kin#".str_replace("'",'',$haab[2])."\"><img src=\"./imagenes/kin/".$haab[2].".png\" width=\"50\"></a>";
                                    echo $stringPrint;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Calendario Cholquij</th>
                                    <td><?php echo isset($cholquij) ? $cholquij." (".$energia1.")" : ''; ?></td>
                                    <td>
                                    <?php 
                                    $stringPrint1.=
                                        "<a href=\"models/paginaModeloElemento.php?elemento=nahual#".str_replace("'",'',$nahual1)."\">     <img src=\"./imagenes/nahual/".$nahual1.".png\" width=\"50\" hspace=\"16\"></a>";
                                    $stringPrint1.=
                                        "<a href=\"models/paginaModeloElemento.php?elemento=energia#".str_replace("'",'',$energia1)."\"><img src=\"./imagenes/energia/".$energia1.".png\" width=\"50\"></a>";
                                    echo $stringPrint1;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Cuenta Larga</th>
                                    <td><?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></td>
                                    <td>------------</tc>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
    </div>
    </section>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>

</body>

</html>