<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coord Trayecto'){
  ?>
<script language="javascript">
window.location="index.php";
</script>
<?php
}
?>
<!DOCTYPE html>
<script type="text/javascript" language="javascript">


  function salir()
  {
  
      if(confirm("¿Desea Salir?")){
      document.location.href='cerrar_login.php';
      }else{
        
      }
    }

</script>
<html lang="en">
<head>
<link href="awgespro.ico" type="image/x-icon" rel="shorcut icon"/>
  <style type="text/css">
  
  .Estilo1{
    
    color:#FFFFFF;
    font-weight:bold;
  }
  
  .Estilo3{ font-family:Arial, Heviltica, sen-serif; }
  
  .Estilo4{ 
  font-family:Arial, Heviltica, sen-serif;
  font-weight:bold; 
  font-size:24px;
  }
  
  </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Awgespro</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="font-awesome/css/font-awesome.css"rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="_all-skins.min.css">
  
  <script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
      <img src="imagenes/menbre.png" style="width:100%;height:40px;">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AW</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Awgespro</b></span>
    </a>
  <aside> 

  <?php include ("menus_ct.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu4.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Proyectos/Estad&iacute;sticas       
      </h1>
      
    </section>

    <section class="content">

      <div class="row">
        <div class="col-xs-12">
             <div class="box">
            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="panel-title text-center">Estad&iacute;stica de proyectos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php

//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();  
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$nomb_pnf=$_POST['nomb_pnf'];
$num_trayecto=$_POST['num_trayecto'];
$num_seccion=$_POST['num_seccion'];
$anio=$_POST['anio'];
$turno=$_POST['turno'];
$sede=$_POST['sede'];
$accion=$_POST['accion'];
$forma=$num_seccion;


if(($accion=='Factibles')and($forma!='Todas')){
$sql="SELECT * FROM estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' ";

}else if(($accion=='No Factibles')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='No Factible' ";

}else if(($accion=='En Espera')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.factibilidad='' OR
proyectos.factibilidad='Sin Asignar' ";

}else if(($accion=='Con Codigos')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo!='' ORDER BY codigo ";

}else if(($accion=='Sin Codigos')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo='' ORDER BY proyectos.id ";

}else if(($accion=='Culminados')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND 
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='3' ORDER BY proyectos.id ";

}else if(($accion=='No Culminados')and($forma!='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
secciones.num_seccion='".$num_seccion."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND  
id_culminacion='4' ORDER BY proyectos.id  ";

} else if(($accion=='Factibles')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='Factible' ";

}else if(($accion=='No Factibles')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
factibilidad='No Factible' ";

}else if(($accion=='En Espera')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.factibilidad='' OR
proyectos.factibilidad='Sin Asignar' ";

}else if(($accion=='Con Codigos')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo!='' ORDER BY codigo ";

}else if(($accion=='Sin Codigos')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
proyectos.id=est_tiene_proy.id_proyecto AND 
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
proyectos.codigo='' ORDER BY proyectos.id ";

}else if(($accion=='Culminados')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND 
id_culminacion='3' ORDER BY proyectos.id ";

}else if(($accion=='No Culminados')and($forma='Todas')){
$sql="SELECT * FROM 
estudiante,pnfs,trayectos,secciones,anios,turnos,sedes,est_cursa_proy,proyectos,est_tiene_proy,proyectos_tiene_culminacion 
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto AND 
proyectos.id=proyectos_tiene_culminacion.id_proyecto AND 
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.periodo='".$anio."' AND
pnfs.nomb_pnf='".$nomb_pnf."' AND
trayectos.descripcion='".$num_trayecto."' AND
turnos.descripcion='".$turno."' AND 
sedes.nombre='".$sede."' AND  
id_culminacion='4' ORDER BY proyectos.id  ";

}

$r=mysql_query($sql);
$cont=mysql_num_rows($r);

if(mysql_num_rows($r)==0){
  ?>
  <script language="javascript" type="text/javascript"> 
 $(document).ready(function(){
sweetAlert("Disculpe", "No se encontraron resultados", "error");
});
function redireccionar(){
window.location="consulta_factibilidad_ct.php";
}
setTimeout('redireccionar()',3000); 
  </script>
  <?php
}else{
?>

              <table id="example1" class="table table-bordered table-striped">
                    <center>
       <b style="color:green;"> <img src="imagenes/bien.png" style="width:30px; height:30px;"> Factible </b>&nbsp; &nbsp;
      <b style="color:red;"> <img src="imagenes/mal.png" style="width:30px; height:30px;"> No factible</b>&nbsp;&nbsp;
      <b style="color:gray;"> <img src="imagenes/relog.png" style="width:30px; height:30px;"> En espera </b>&nbsp;&nbsp; 

<a target="_blank" href="reporte_proyecto_filtros.php?forma=<?php echo $forma;?>&accion=<?php echo $accion;?>&anio=<?php echo $anio;?>&pnf=<?php echo $nomb_pnf;?>&trayecto=<?php echo $num_trayecto?>&seccion=<?php echo $num_seccion;?>&turno=<?php echo $turno?>&sede=<?php echo $sede;?>">

 <img src="imagenes/pdf.png" style="width:30px; height:30px;">
 <b style="color:gray;"> Ver pdf </b></a>&nbsp;&nbsp; 

<a  target="_blank" href="graficos.php?accion=<?php echo $accion;?>&forma=<?php echo $forma;?>&anio=<?php echo $anio;?>&nomb_pnf=<?php echo $nomb_pnf;?>&num_trayecto=<?php echo $num_trayecto?>&num_seccion=<?php echo $num_seccion;?>&sede=<?php echo $sede;?>&turno=<?php echo $turno;?>">
<img src="imagenes/grafico.png" style="width:30px; height:30px;"> 
<b style="color:gray;"> Ver gr&aacute;fico </b> </a>
                <thead>
                <br>
                <tr>
                  <th>T&iacute;tulo</th>
                  <th>Pnf</th>
                  <th>Trayecto</th>
                  <th>Secci&oacute;n</th>
                  <th>Factibilidad</th>
                </tr>
                </thead>
                <tbody>
                       <?php 
					   while($row=mysql_fetch_array($r)){
						?>
                       <tr>
                                            <td ><p align='justify'><?php echo $row['titulo'];?></p></td>
                                            <td align='center'><?php echo $row['nomb_pnf'];?></td>
                                            <td align='center'><?php echo $row['descripcion'];?></td>
                                            <td align='center'><?php echo $row['num_seccion'];?></td>
                      <td align='center'> <center>
                      <?php 
                      if ($row['factibilidad']=='Factible'){?>
                      <img src="imagenes/bien.png" style="width:30px; height:30px;">
                      <?php } else
                      if ($row['factibilidad']=='No Factible'){?>
                      <img src="imagenes/mal.png" style="width:30px; height:30px;">
                      <?php } else
                      if ($row['factibilidad']==''){?>
                      <img src="imagenes/relog.png" style="width:30px; height:30px;">
                      </center></td>
                                            </tr>
                      <?php }}} 
                      ?> 
                </tbody>
              </table>
                               <table id="example1" class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <td align='center'>Filtro seleccionado</td>
                                        <td align='center'>Cantidad</td>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <tr>
                                            <td align='center'><?php echo 'Proyectos'.'&nbsp;'.$accion;?></td>
                                            <td align='center'><?php echo $cont;?></td>                                                                                    
                                            </tr>

                                      </tbody>
                                </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  
    </div>

  
<?php
include("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
   </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap.min.js"></script>
<!-- DataTables -->
<script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="fastclick.js"></script>
<!-- AdminLTE App -->
<script src="app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="demo.js"></script>

<script>
 $(document).ready(function() {
            var table = $('#example1').DataTable({
                dom: 'lBfrtip',/*Bfrtip*/
                buttons: [
                    {
                        extend: 'colvis',
                        columns: ':not(:first-child)',
                    },
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                "language" : {
                    "url":"{{ assetsUrl }}assets/js/DataTables/i18n/Spanish.json"
                },
                "lengthMenu": [[5, 10/*, 20, -1*/], [5, 10/*, 20, "Todos"*/]]
            });
            /*http://stackoverflow.com/a/33537085/1883256*/
            table.on( 'draw', function () {
                var body = $( table.table().body() );
 
                body.unhighlight();
                body.highlight( table.search() );
            } );
 
        } );
</script>
</body>
</html>
