<?php  

@session_start();
if(!$_SESSION){
  
  header("Location:index.php");
  
}


?>

<?php 
if($_SESSION['tipocuentas']!='Administrador'){
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

function solonumeros(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key);

numeros="0123456789";

especiales="8-37-38-46";

teclado_especial=false;

for(var i in especiales){

if(key==especiales[i]){

teclado_especial=true;

        }

      }

  if(numeros.indexOf(teclado)==-1 && !teclado_especial){
  return false;
  }
}


function sololetras(e){

key=e.keyCode || e.which;

teclado=String.fromCharCode(key).toLowerCase();

letras=" abcdefghijklmnopqrstuvwxyz";

especiales="8-37-38-46-164";

teclado_especial=false;

      for(var i in especiales){

    if(key==especiales[i]){
  
  
  teclado_especial=true;break;
  
    }

  }
  
  if(letras.indexOf(teclado)==-1 && !teclado_especial){
  
  return false;
  
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

  <?php include ("menus_adm.php"); ?>

</aside>
    <!-- Header Navbar: style can be found in header.less -->

  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside> 

  <?php include ("menu.php"); ?>

</aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <h1 class="panel-title text-center">
      Usuarios/Registrar/Secretarios      
      </h1>
      
    </section>

      <section class="content">
<?php 
$mysql="SELECT * FROM profesores WHERE ci='".$_SESSION['cedula_usu']."' ";
$query=mysql_query($mysql);
$data=mysql_fetch_array($query);
?>

         <div class="col-md-8 col-md-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            <h2 class="panel-title text-center">Todos los campos con (<img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; ">) son obligatorios</h2>
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="usunuevo_registrado.php" name="form" method="post">
              <div class="box-body panel-title text-center">
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Nombres</label>

                  <div class="col-sm-6">
                   <input type="text" name="nombres" id ="nombres" class="form-control" onkeypress="return sololetras(event);" onpaste="return false" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label" align="right">Apellidos</label>

                  <div class="col-sm-6">
                  <input type="text" name="apellidos" id ="apellidos" required class="form-control" onkeypress="return sololetras(event);" onpaste="return false" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Nacionalidad</label>

                   <div class="col-sm-6">
                   <select name="nacionalidad" id="nacionalidad"  class="form-control" required>
                   <option value="">Seleccione</option>
                   <option value="V">Venezolano(a)</option>
                   <option value="E">Extranjero(a)</option>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">C.I</label>

                  <div class="col-sm-6">
                   <input type="text" onkeypress="return solonumeros(event);" onpaste="return false" maxlength="8" name="ci"  value="" placeholder="12345678" class="form-control" required="">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Tel&eacute;fono</label>

                  <div class="col-sm-6">
                  <div class="input-group">
                <div class="input-group-btn">
                 <select class="form-control-1" name="cod" style="width:85px;" required="">                  
                 <option value="Linea">Linea</option>
                 <option value="0243">0243</option>
                 <option value="0244">0244</option>
                 <option value="0412">0412</option>
                 <option value="0414">0414</option>
                 <option value="0416">0416</option>
                 <option value="0424">0424</option>
                 <option value="0426">0426</option>
                 </select>
                </div>
                <!-- /btn-group -->
                <input type="text" class="form-control" placeholder="N&uacute;mero"  onkeypress="return solonumeros(event);" onpaste="return false" size="27" maxlength="7" name="telefono" id ="telefono" required="">

              </div>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>
                
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Sexo</label>

                  <div class="col-sm-6">
                   <select name="sexo" id="sexo"  class="form-control" required="">
                   <option value="">Seleccione</option>
                   <option value="M">Masculino</option>
                   <option value="F">Femenino</option>
                   </select>
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label" align="right">Grado</label>

                  <div class="col-sm-6">
                  <select name="grado_instr" id="grado_instr" required class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Bachiller">Bachiller</option>
                    <option value="TSU">TSU</option>
                    <option value="Lic">Lic</option>
                    <option value="Ing">Ing</option>
                    <option value="Otro">Otro</option>
                   </select>
                   <input type="hidden" name="campo" id="campo" value="<?php echo $campo;?>">
                  </div><img src="imagenes/asterisco.jpg" style=" width:15px;  height:15px; " align="Left" />
                </div>           

                 <?php
                $sql="SELECT MAX(periodo)AS'anio' FROM anios ";
                $r=mysql_query($sql);
                $row=mysql_fetch_array($r);
                ?>

                <input type="hidden" name="anio" id="anio" value="<?php echo $row['anio'];?>">   

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <center>
                 <button type="submit" class="btn btn-info" onclick="ValidarCadenaExpReg();"> <i class="fa fa-share" aria-hidden="true"></i>
                Registrar </button>
                </center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

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

