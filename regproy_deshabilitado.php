<?php  

@session_start();
if(!$_SESSION){
	
	header("Location:index.php");
	
}


require_once("clasedb.php"); 
$db=new clasedb();
$db->conectar();	
mysql_query("SET NAMES 'utf8'");
extract($_REQUEST);
	

  $operacion=$_POST['operacion'];

if($operacion=='Registrar Proyecto'){

$consulta="UPDATE usuario_tiene_permiso SET id_permiso='0' WHERE id_operacion='1' ";
		
//ejecuta la inserci�n
$incluir=mysql_query($consulta);

//echo $consulta;

	 if($incluir==0){
?>
        <script type="text/javascript">
          alert('No se Pudo Deshabilitar este privilegio al estudiante');
          window.location='index2.php';
        </script>
<?php
	 }
	 else { 
		  ?>
       <script type="text/javascript">
          alert('El privilegio de Este estudiante se Deshabilito Exitosamente');
          window.location='index2.php';
        </script> 
		<?php
			date_default_timezone_set('America/Caracas');
		$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE DESHABILITO PRIVILEGIOS AL ESTUDIANTE TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);

	 }

}else if($operacion=='Registrar Asistencias'){
	
$consulta="UPDATE usuario_tiene_permiso SET id_permiso='0' WHERE id_operacion='2' ";
		
//ejecuta la inserci�n
$incluir=mysql_query($consulta);

//echo $consulta;

	 if($incluir==0){
?>
        <script type="text/javascript">
          alert('No se Pudo Otorgar este privilegio al estudiante');
          window.location='cons_permisos.php';
        </script>
<?php
	 }
	 else { 
		  ?>
       <script type="text/javascript">
          alert('El privilegio de Este estudiante se Deshabilito Exitosamente');
          window.location='cons_permisos.php';
        </script> 
		<?php
			date_default_timezone_set('America/Caracas');
		$sql="INSERT INTO historial VALUES ('null',".$_SESSION['id_usu'].",  'EL USUARIO QUE DESHABILITO PRIVILEGIOS AL ESTUDIANTE TIENE ESTE ID:".$_SESSION['id_usu']. "','".date("Y-m-d")."','".date("h:i")."')";
//echo $sql;
mysql_query($sql);

	 }
	
}
?>