<script src="disti/jquery-1.12.3.min.js"></script>
<script src="disti/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="disti/sweetalert.css"/>
<?php
require_once("clasedb.php"); $db=new clasedb(); $db-> conectar(); 

$mysql="SELECT * FROM estudiante,usuarios WHERE estudiante.ci=usuarios.ci AND 
nivel='Estudiante' AND usuarios.status='Bloqueado' ";
$r1=mysql_query($mysql);
$cont1=mysql_num_rows($r1);
	
$mysql2="SELECT * FROM profesores,usuarios WHERE 
profesores.ci=usuarios.ci AND 
usuarios.status='Bloqueado' ";
$r2=mysql_query($mysql2);
$cont2=mysql_num_rows($r2);	
	
$mysql3="SELECT * FROM secretarios,usuarios WHERE secretarios.ci=usuarios.ci AND 
 nivel='Secretario' AND usuarios.status='Bloqueado' AND usuarios.ci!='".$_SESSION['cedula_usu']."' ";
$r3=mysql_query($mysql3);
$cont3=mysql_num_rows($r3);

$sql="select * from profesores, usuarios where 
profesores.ci = usuarios.ci and 
usuarios.ci= '".$_SESSION['cedula_usu']."' and nivel='Administrador' ";
$r=mysql_query($sql);
				  //echo $sql;
$row=mysql_fetch_array($r);
?>
<script type="text/javascript" language="javascript">

function salir()
{
	
swal({
  title: "¿Desea cerrar sesión?",
  type: "warning",
  cancelButtonText: "Cancelar",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Aceptar",
  closeOnConfirm: false
},
function(){
window.location="cerrar_login.php";
});

}

</script>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Menu horizontal -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Inicio -->

          <li class="dropdown messages-menu">
            <a href="index2.php">
              <i class="fa fa-home"></i>
              <span class="hidden-xs">Inicio</span>
            </a>
  
            
          <!-- Ayuda -->
         <li class="dropdown tasks-menu" id="desplegarAyuda">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             <i class="fa fa-question-circle"></i>
             <span class="hidden-xs">Ayuda</span>
            </a>
           
            <ul class="notificationHelp extended inbox" id="notificacionAyuda">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
                <li class="message"><a class="message-notification" href="manual_adm.php"> Manual </a></li>
                <li class="message"><a class="message-notification" href="contacto.php"> Contacto</a></li>
              
                   </ul>
            </li>
          </li>
         
          <!-- Mantenimiento -->
          <li class="dropdown tasks-menu" id="desplegarMant">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-wrench"></i>
              <span class="hidden-xs">Mantenimiento</span>
            </a>
            <ul class="notificationMant extended inbox" id="notificacionMant">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
                <li class="message"><a class="message-notification"href="verificarclave.php?opc=1"> Historial </a></li>
                <li class="message"><a class="message-notification" href="verificarclave.php?opc=2"> Respaldar base de datos</a></li>
                <li class="message"><a class="message-notification" href="verifica_restore.php"> Restaurar base de datos</a></li>
                <li class="message"><a class="message-notification" href="descripcion_bd.php"> Descripci&oacute;n de base de datos</a></li>

                   </ul>
            </li>
			
			<?php
			if((mysql_num_rows($r1)>0)and(mysql_num_rows($r2)>0)and(mysql_num_rows($r3)>0)){
			?>
			<li class="dropdown tasks-menu" id="desplegar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	               <span class="label label-danger">3</span>
                    <span class="hidden-xs"><i class="bell fa fa-bell "></i></span>
                </a>
                <ul class="notification extended inbox" id="notificacion">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                        <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
			   <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php 
			}else if((mysql_num_rows($r1)>0)and(mysql_num_rows($r2)>0)){
			?>
			          <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i>es</span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if((mysql_num_rows($r1)>0)and(mysql_num_rows($r3)>0)){
			?>
			 			        <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i>es</span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiantes(s) con cuenta bloqueada</a></li>
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if((mysql_num_rows($r2)>0)and(mysql_num_rows($r3)>0)){
			?>
			        <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">2</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i>es</span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>
               <li><a href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if(mysql_num_rows($r1)>0){
			?>
					         <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i></span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Estudiantes">Hay <?php echo $cont1;?> estudiante(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php 
			}else if(mysql_num_rows($r2)>0){
			?>
			      				         <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i></span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Profesores">Hay <?php echo $cont2;?> profesor(es) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}else if(mysql_num_rows($r3)>0){
			?>
			  <li class="dropdown tasks-menu" id="desplegar">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	    <span class="label label-danger">1</span>
             
              <span class="hidden-xs"><i class="bell fa fa-bell"></i></span>
            </a>
            <ul class="notification extended inbox" id="notificacion">
                <div class="notify-arrow notify-arrow-green"></div>
                    <li class="cinta">
                    <p class="green"></p>
                    </li>
                            
               <li class="message"><a class="message-notification" href="lista_bloqueados.php?tipo=Secretarios">Hay <?php echo $cont3;?> secretario(s) con cuenta bloqueada</a></li>		

                   </ul>
            </li>
			<?php
			}
			?>
		  		  
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php 

			if(($row['foto']=='')or($row['foto']=='fotousuarios/')){
	?>
	<img src="imagenes/user.png" style='' class="user-image" alt="User Image">
	<?php
}else{
echo "<img src='".$row['foto']."' style='' class='user-image' alt='User Image'> ";
}
?>
              <span class="hidden-xs"><i class="fa fa-angle-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  <?php			
			if(($row['foto']=='')or($row['foto']=='fotousuarios/')){
	?>
	<img src="imagenes/user.png" class="img-circle" alt="User Image">
	<?php
}else{
echo "<img src='".$row['foto']."' class='img-circle' alt='User Image'>";
}
?>
                <p>
                  <?php 
				  if(mysql_num_rows($r)>0){
				  echo $row['nombres'].'&nbsp;'.$row['apellidos'] ;
				  }else{
					echo $_SESSION['nombre_usu'];	  
				  }	
		
		
				  ?> - Administrador
				  
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left icons" title="Personalizar">
                  <a href="bus_usuarioct.php" > 
                  <i class="fa fa-user icon"></i> </a>
                </div>

                <div class="pull-left icons" title="Configuración">
                  <a href="tema_ct.php"> <i class="fa fa-cog icon"></i> </a>
                </div>
        
                <div class="pull-left icons" title="Clave">
                  <a href="validaclave.php" > <i class="fa fa-lock icon"></i> </a>
                </div>
                <div class="pull-left icons" style="cursor: pointer;" title="Salir">
                  <a  onclick="salir();">
                    <i class="fa fa-power-off icon"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>