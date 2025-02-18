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
$energiaNombre = $nahual[1];
$cholquij = $nahual[0]." ". strval($energia);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Tiempo Maya</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include "blocks/bloquesCss.html" ?>
  <link rel="stylesheet" href="css/estilo.css?v=<?php echo(rand()); ?>" />
  <link rel="stylesheet" href="css/estiloAdmin.css?v=<?php echo(rand()); ?>" />

    <link rel="stylesheet" href="css/index.css?v=<?php echo (rand()); ?>" />


</head>

<body>

<?php include "NavBar.php" ?>
 <div>
 <section id="inicio">
    <div id="inicioContainer" class="inicio-container">
      <h1><br><br>Bienvenido al Tiempo Maya</h1>
      <div id='formulario' style="padding: 15px; width: auto;">
      <h5 style="color: whitesmoke;">Calendario Haab : <?php echo isset($haab[0]) ? $haab[0]." (".$haab[2].")" : ''; ?>
           <?php 
           $out = 
           "<a href=\"models/paginaModeloElemento.php?elemento=uinal#".str_replace("'",'',$haab[1])."\">     <img src=\"./imagenes/uinal/".$haab[1].".png\" width=\"50\" hspace=\"16\"></a>"
           ."<a href=\"models/paginaModeloElemento.php?elemento=kin#".str_replace("'",'',$haab[2])."\"><img src=\"./imagenes/kin/".$haab[2].".png\" width=\"50\"></a>"
           ; 
      echo $out;
      ?>
    </h5>
      <h5 style="color: whitesmoke;">Calendario Cholquij : <?php echo isset($cholquij) ? $cholquij." (".$energiaNombre.")" : ''; ?>
           <?php $out1 = 
           "<a href=\"models/paginaModeloElemento.php?elemento=nahual#".str_replace("'",'',$nahual1)."\">     <img src=\"./imagenes/nahual/".$nahual1.".png\" width=\"50\" hspace=\"16\"></a>"
           ."<a href=\"models/paginaModeloElemento.php?elemento=energia#".str_replace("'",'',$energiaNombre)."\"><img src=\"./imagenes/energia/".$energiaNombre.".png\" width=\"50\"></a>"
           ;
      echo $out1;
      ?>
    </h5>
      <h5 style="color: whitesmoke;">Cuenta Larga : <?php echo isset($cuenta_larga) ? $cuenta_larga : ''; ?></h5>
      <label style="color: whitesmoke;"><?php echo isset($fecha_consultar) ? $fecha_consultar : ''; ?></label>
</div>
    </div>
  </section>
 </div>
 
  
  <?php include "blocks/bloquesJs1.html" ?>

</body>
</html>
