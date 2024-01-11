<?php require_once('Connections/conexion.php'); ?>
<?php

if($validacion==true){
	if($Admi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos Administrativos'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }


//recibimos la id
$id=$_GET["id"];


//validar que quede algun usuario 

mysql_select_db($database_conexion, $conexion);
$query_usuario = "SELECT * FROM seguridad";
$usuario = mysql_query($query_usuario, $conexion) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);


if($totalRows_usuario==1){
	
echo"<script type=\"text/javascript\">alert ('Debe dejar al menos un usuario'); location.href='principal.php?link=link71' </script>";
exit;
}


//validar que quede algun usuario con permisos administrativos
if($Admi==1){
mysql_select_db($database_conexion, $conexion);
$query_usuario = "SELECT * FROM seguridad where administrar=1 and id_seg!='$id'";
$usuario = mysql_query($query_usuario, $conexion) or die(mysql_error());
$row_usuario = mysql_fetch_assoc($usuario);
$totalRows_usuario = mysql_num_rows($usuario);
 
if($totalRows_usuario==0){

echo"<script type=\"text/javascript\">alert ('Debe dejar al menos un usuario con permisos administrativos'); location.href='principal.php?link=link71' </script>";
exit;
}

}//fin del if admin


$sql2="select * from seguridad where id_seg='$id'";
$verificar2=mysql_query($sql2,$conexion) or die(mysql_error());
$row_verificar2=mysql_fetch_assoc($verificar2);



$sql="delete from seguridad where id_seg='$id'";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	 if($HTTP_COOKIE_VARS["usr"]==$row_verificar2['usuario']){
 echo "<script type=\"text/javascript\">alert ('Debe volver a iniciar sesion');  location.href='cerrarSesion.php' </script>";

 }else{
	echo"<script type=\"text/javascript\">alert ('usuario Eliminado'); location.href='principal.php?link=link71' </script>";
}}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link71' </script>";
	
}//fin de l primer else



mysql_free_result($usuario);
?>