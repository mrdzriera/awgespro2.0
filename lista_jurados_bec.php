<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Estudiante'){
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

		function ValidarCadenaExpReg()
{

cadena = "^[0-9]{2,3}-? ?[0-9]{6,7}$";
a= new RegExp(cadena) ;

if(document.getElementById("textValidReg").value.match(a)){

}

else{

alert("formato de cedula incorrecto");

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

	<?php include ("menus_est.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu2.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
				
	
       <div class="col-md-13">
       <br>
     <h1 class="panel-title text-center">
        Beca Trabajo/Consultas/Jurados
         
     </h1>
            <div class="col-md-13">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Consultar jurados</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">
                      </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">

    <br>
                    <?php

//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);

$ci=$_POST['ci'];
$anio=$_POST['anio'];

//datos del proyecto y del coordinador
$sql="SELECT 
proyectos.*,
profesores.nombres,
profesores.apellidos,
pnfs.nomb_pnf,
trayectos.descripcion,
secciones.num_seccion
FROM estudiante,anios,pnfs,trayectos,secciones,proyectos,profesores,est_cursa_proy,prof_dicta_proy,est_tiene_proy
 WHERE 
prof_dicta_proy.id_profesor = profesores.id AND
 prof_dicta_proy.id_pnf = pnfs.id AND
 prof_dicta_proy.id_trayecto = trayectos.id AND
prof_dicta_proy.id_seccion = secciones.id AND 
 prof_dicta_proy.id_anio = anios.id AND
 est_cursa_proy.id_estudiante = estudiante.id AND
est_cursa_proy.id_pnf = pnfs.id AND 
 est_cursa_proy.id_trayecto = trayectos.id AND
 est_cursa_proy.id_seccion = secciones.id AND
 est_cursa_proy.id_anio = anios.id AND
est_tiene_proy.id_estudiante1=estudiante.id AND 
est_tiene_proy.id_proyecto=proyectos.id AND
estudiante.ci='".$ci."' AND anios.periodo='".$anio."' ";
$r=mysql_query($sql);
$row=mysql_fetch_array($r);//fin

//datos del proyecto y del tutor
$sql2="SELECT profesores.nombres,profesores.apellidos 
FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,tutor_tiene_proyectos,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=tutor_tiene_proyectos.id_proyecto AND
	profesores.id=tutor_tiene_proyectos.id_profesor AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci='".$ci."' AND anios.periodo='".$anio."' ";
$r2=mysql_query($sql2);
$row2=mysql_fetch_array($r2);//fin

//datos del proyecto y del comite1
$sql3="SELECT profesores.nombres,profesores.apellidos 
FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite1 AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci='".$ci."' AND anios.periodo='".$anio."' ";
$r3=mysql_query($sql3);
$row3=mysql_fetch_array($r3);//fin

//datos del proyecto y del comite2
$sql4="SELECT profesores.nombres,profesores.apellidos 
FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite2 AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci='".$ci."' AND anios.periodo='".$anio."' ";
$r4=mysql_query($sql4);
$row4=mysql_fetch_array($r4);//fin

//datos del proyecto y del comite2
$sql5="SELECT profesores.nombres,profesores.apellidos 
FROM proyectos,estudiante,pnfs,trayectos,secciones,anios,profesores,proyectos_tiene_comite,est_cursa_proy,est_tiene_proy 
	WHERE
	proyectos.id=proyectos_tiene_comite.id_proyecto AND
	profesores.id=proyectos_tiene_comite.id_comite3 AND
	estudiante.id=est_cursa_proy.id_estudiante AND 
	pnfs.id=est_cursa_proy.id_pnf AND 
	trayectos.id=est_cursa_proy.id_trayecto AND 
	secciones.id=est_cursa_proy.id_seccion AND 
	anios.id=est_cursa_proy.id_anio AND 
	estudiante.id=est_tiene_proy.id_estudiante1 AND
	proyectos.id=est_tiene_proy.id_proyecto AND
	estudiante.ci='".$ci."' AND anios.periodo='".$anio."' ";
$r5=mysql_query($sql5);
$row5=mysql_fetch_array($r5);//fin

if((mysql_num_rows($r)==0)and(mysql_num_rows($r2)==0)and(mysql_num_rows($r3)==0)){
?>
<script language="javascript">
$(document).ready(function(){
sweetAlert("Disculpe", "Este proyecto no tiene jurado asignado en el periodo academico indicado", "error");
});
function redireccionar(){
window.location="consulta_bec.php";
}
setTimeout('redireccionar()',2000);
</script>
<?php
}else{ ?>
           <center><table  class="table table-bordered table-striped" >
				 <thead>
				 
<tr>
	<td><center><strong>T&iacute;tulo</strong></center></td>
	<td><center><strong>PNF</strong></center></td>
	<td><center><strong>Trayecto</strong></center></td>
	<td><center><strong>Secci&oacute;n</strong></center></td>
	<td><center><strong>&nbsp;C&oacute;digo</strong></center></td>
	</tr>
	</thead>
	<tbody>
	<tr>
    <td><center><?php echo $row['titulo'];?></center></td>
	<td><center><?php echo $row['nomb_pnf'];?></center></td>
	<td><center><?php echo $row['descripcion'];?></center></td>
	<td><center><?php echo $row['num_seccion'];?></center></td>
	<td><center><?php echo $row['codigo'];?></center></td>
	</tr>
	</tbody>
	</table>
	  <?php
}
?>  
<table  class="table table-bordered table-striped" >
		 <thead>
  <tr>
	<td><center><strong>Coordinador:</strong></center></td>
	<td><center><strong>&nbsp;Tutor:</strong></center></td>
	<td><center><strong>&nbsp;Jurado 1:</strong></center></td>
	<td><center><strong>&nbsp;Jurado 2:</strong></center></td>
	<td><center><strong>&nbsp;Jurado 3:</strong></center></td>
    </tr>
	</thead>
	<tbody>
		<tr>
	<td><center><?php echo $row['nombres'].'&nbsp;'.$row['apellidos'];?></center></td>
	<td><center><?php echo $row2['nombres'].'&nbsp;'.$row2['apellidos'];?></center></td>
	<td><center><?php echo $row3['nombres'].'&nbsp;'.$row3['apellidos'];?></center></td>
	<td><center><?php echo $row4['nombres'].'&nbsp;'.$row4['apellidos'];?></center></td>
	<td><center><?php echo $row5['nombres'].'&nbsp;'.$row5['apellidos'];?></center></td>
	</tr>
	</tbody>
	</table>
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
</body>
</html>
