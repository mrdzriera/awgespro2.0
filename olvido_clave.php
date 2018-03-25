<!DOCTYPE html>
<html>
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
  <link rel="stylesheet" href="estilos/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/flat-login.css">
   <link rel="stylesheet" href="estilos/bootstrap/css/flat-logiin.css">
  <link rel="stylesheet" href="estilos/bootstrap/css/animate.css">
  <link rel="stylesheet" href="estilos/sweetalert/dist/sweetalert.css">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="estilos/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="estilos/plugins/iCheck/square/blue.css">
</head>

<body class="hold-transition login-page">
<br>
<div class="login-box animated bounceIn">

<div class="login-box">

  <div class="login-logo">
    

  </div> <!-- Fin de login-logo -->
<br>
  <div class="login-box-body">

  <div class="login-register-form-section">
      <h4 align="center" ><b> Sistema para la gesti&oacute;n de proyectos <BR>(AWGESPRO)<BR> </b><br></h4>
	
      <ul class="nav nav-tabs" role="tablist">
        
      <li class="active"><a href="#login" data-toggle="tab"> <center> Recuperar contrase&ntilde;a </center></a></li> 
      
      </ul>
	  

       <div class="tab-content">

       <div role="tabpanel" class="tab-pane fade in active" id="login">
        
<form class="form-horizontal" method="post" action="rescatar_clave.php">

      <div class="form-group ">
        <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-user"></i></div>
        <input type="text" name="usuario" class="form-control" placeholder="Usuario" required="required" value="">

          </div>
                            
      </div>

      <div class="row">
       
        <div class="col-xs-6">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Buscar</button>
              </div>

              <div class="col-xs-6">
              <a href="index.php" class="btn btn-primary btn-block btn-flat">Volver</a>
        
              </div>

              <br>
              <br>
              <br>

              <tr>
         <td><center><a href="reestablecer_clave.php">¿Olvidaste tu respuesta?</a></center></td>
             </tr>
         
        <!-- /.col -->

      </div>

         
        <!-- /.col -->

      </div>

</form> <!-- Fin de form-horizontal 1 -->


       </div> <!-- Fin de tab-pane fade in active --> 


       </div> <!-- Fin de tab-content --> 

  </div> <!-- Fin de login-register -->

    <form action="../../index2.html" method="post">
      

    </form> <!-- Fin de form 1 -->
    
   </div> <!-- Fin de login-box-body -->

  </div> <!-- Fin de login-box -->

 </div> <!-- Fin de login-box animated bounceIn -->

<!-- script -->

<script src="estilos/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="estilos/bootstrap/js/bootstrap.min.js"></script>
<script src="estilos/plugins/iCheck/icheck.min.js"></script>
<script src="estilos/bootstrap/js/jquery.js"></script>
<script src="estilos/bootstrap/js/jquery-1.8.2.min.js"></script>
<script src="estilos/bootstrap/js/jquery.backstretch.min.js"></script>
<script src="estilos/bootstrap/js/scripts.js"></script>
<script src="estilos/bootstrap/sweetalert/sweetalert.min.js"></script>

<script>

  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
