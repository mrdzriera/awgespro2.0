<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


?>

<?php 
if($_SESSION['tipocuentas']!='Coordinador'){
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
	
			if(confirm("�Desea Salir?")){
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

	<?php include ("menus_coord.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
	<aside> 

	<?php include ("menu3.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Registrar Factibilidad
      </h1>
      
    </section>
<section class="content">

       <div class="col-md-12">
            
            <div class="col-md-12">
                <!-- begin panel -->
                <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
                    <div class="panel-heading">
                        <h4 class="panel-title text-center">Asignar factibilidad de proyecto</h4>

                    </div>
                    <ul class="nav nav-tabs" role="tablist">

                      </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="profile">
                            
                        <div class="tab-pane fade active in" id="home">
                            <div class="table-responsive">
  <?php
  require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();

$query="SELECT * FROM 
usuarios,operaciones,permisos,usuario_tiene_permiso 
WHERE
usuarios.id=usuario_tiene_permiso.id_usuario AND 
operaciones.id=usuario_tiene_permiso.id_operacion AND 
permisos.id=usuario_tiene_permiso.id_permiso AND
operaciones.nombre='Registrar Factibilidad' AND
permisos.estado='Deshabilitado' AND
usuarios.ci='".$_SESSION['cedula_usu']."' ";
$ejecuta=mysql_query($query);

if(mysql_num_rows($ejecuta)>0){
?>  
<script language="javascript">
alert("Disculpe Ud aun no esta autorizado para registrar factibilidad a los proyectos");
window.location="index4.php";
</script>
<?php
}

$id=$_GET['id'];

$busqueda="SELECT *,estudiante.ci AS'ci_est',proyectos.id,nomb_pnf,
trayectos.descripcion,secciones.num_seccion,anios.periodo,turnos.descripcion AS'des_tur'
FROM proyectos,profesores,estudiante,est_tiene_proy,
proyectos_tiene_comite,proyectos_tiene_opinion,pnfs,trayectos,secciones,turnos,anios,sedes,est_cursa_proy
WHERE
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
proyectos.id=est_tiene_proy.id_proyecto AND 
estudiante.id=est_tiene_proy.id_estudiante1 AND 
proyectos.id=proyectos_tiene_comite.id_proyecto AND
profesores.id=proyectos_tiene_comite.id_comite3 AND
proyectos.id=proyectos_tiene_opinion.id_proyecto AND 
 proyectos.id='".$id."' ";
$bus=mysql_query($busqueda);
$cont=mysql_num_rows($bus);
if(mysql_num_rows($bus)==0){
?>
<script language="javascript">
alert("No hay un proyectos pendientes por opinar factibilidad donde su posision sea coordinador");
window.location="opera_opiniones.php";
</script>
<?php
}else{ ?>
                   <form action='factibilidad_registrada.php' name='form' method='post' >
            
                                <table class="table table-bordered table-striped">
                                <thead><tr>
                                <center>
                                        <th><center>Lider de proyecto</center></th>
                                        <th><center>Pnf</center></th>
                                        <th><center>Trayecto</center></th>
                                        <th><center>Turno</center></th>
                                        <th>Opini&oacute;n </th>
                                        <th>Observaciones </th>
                                        <th>Ver Pdf</th>
                                  </center>  
                                    </tr>
                                    </thead>
                                     <tbody>
                                            <?php $fila=mysql_fetch_array($bus);
                                            for($i=0; $i<$fila;$i++){ ?>
                                            <tr>
                                            <td ><p align='center'><?php echo $fila['nombres'].'&nbsp'.$fila['apellidos'];?></p></td>
                                            <td ><p align='center'><?php echo $fila['nomb_pnf'];?></p></td>
                                             <td ><p align='center'><?php echo $fila['descripcion'];?></p></td>
                                             <td ><p align='center'><?php echo $fila['des_tur'];?></p></td><td align='center'><input type='hidden' name='indice' value='$cont' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='titulo[]' value='<?php echo $fila['titulo'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='id[]' value='<?php echo $fila['id_proyecto'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='ci[]' value='<?php echo $_SESSION['cedula_usu'];?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <input type='hidden' name='indice' value='<?php echo $cont;?>' size='1' max-length='20' placeholder='Cedula Estudiantil' readonly title='Cedula'/>
                                            <select type='text' name='opn_esp3[]' class="form-control-sel" style="width:130px" id='opn_esp3' required>;                                  
                                            <option value='0'> Sin asignar</option>
                                            <option value='Si'> Factible</option>
                                            <option value='No'> No factible</option>
                                            </select></td>
                                            <td align='center'><input name='obs_esp3[]' class="form-control" maxlength="60" placeholder="Maximo de 60 caracteres"/></td>                                          
                                            <td align='center'>
                                            <input type="hidden" name="ci" id="ci" value="<?php echo $fila['ci_est'];?>">
                                            <input type="hidden" name="id_estudiante2" id="id_estudiante2" value="<?php echo $fila['id_estudiante2'];?>">
                                            <input type="hidden" name="id_estudiante3" id="id_estudiante3" value="<?php echo $fila['id_estudiante3'];?>">
                                            <a target="_blank" href="planilla_inscripcion.php?id=<?php echo $id;?>" ><img src="imagenes/pdf.png" style="width:30px; height:30px;" ></a></td>
											</tr>
                                            <?php  $fila=mysql_fetch_array($bus);
} ?>
                                      </tbody>
                                </table>
                                <div class="box-footer"><br>
                            <center><button type="submit" class="btn btn-info pull"> <i class="fa fa-share" ></i>
                            Registrar </button></center>
              </div>
                  </form>
                  <?php } ?>

                            </div>
                        </div>
                        

                    </div>

                <!-- end panel -->
            </div>
        </div>
		</div>
</div>
    </section>
	<section>
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Verificar plagio de proyecto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>T&iacute;tulo</th>
                  <th>Pnf</th>
                  <th>Trayecto</th>
                  <th>Secci&oacute;n</th>
                  <th>Ver Pdf</th>
                </tr>
                </thead>
                <tbody>
				 <?php

//CONSULTA PARA LA CUENTA DE PROYECTOS FACTIBLES
require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();
mysql_query("SET NAMES 'utf8'");	
extract($_REQUEST);

$sql="SELECT *,estudiante.ci AS'ci_est',proyectos.id
FROM pnfs,trayectos,secciones,turnos,anios,sedes,proyectos,estudiante,est_tiene_proy,est_cursa_proy
WHERE 
estudiante.id=est_cursa_proy.id_estudiante AND
pnfs.id=est_cursa_proy.id_pnf AND
trayectos.id=est_cursa_proy.id_trayecto AND
secciones.id=est_cursa_proy.id_seccion AND
anios.id=est_cursa_proy.id_anio AND
turnos.id=est_cursa_proy.id_turno AND
sedes.id=est_cursa_proy.id_sede AND
anios.id=proyectos.id_anio AND
estudiante.id=est_tiene_proy.id_estudiante1 AND
proyectos.id=est_tiene_proy.id_proyecto ";

$r=mysql_query($sql);// FIN DE LA CONSULTA PARA EL ORDEN DE LA FACTIBILIDAD

?>				<?php while($row=mysql_fetch_array($r)){ ?>
                <tr>
                  <td><p align='justify'><?php echo $row['titulo'];?></p></td>
                  <td><?php echo $row['nomb_pnf'];?></td>
                  <td><?php echo $row['descripcion'];?></td>
                  <td><?php echo $row['num_seccion'];?></td>
                  <td><a target="_blank" href="planilla_inscripcion.php?id=<?php echo $row['id'];?>" ><img src="imagenes/pdf.png" style="width:30px; height:30px;" ></a></td>
                </tr>
															<?php }
											
											?> 
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
<!-- page script -->
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
