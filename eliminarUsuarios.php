<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>
<?php

 
//validar usuario

if($validacion==true){
	if(admin==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='fondo.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='fondo.php'  </script>";
 exit;
}
?>
<?php

$id=$_GET['id'];
mysql_select_db($database_funeraria, $funeraria);
$query_usuarios = "SELECT * FROM seguridad where id!=$id";
$usuarios = mysql_query($query_usuarios, $funeraria) or die(mysql_error());
$row_usuarios = mysql_fetch_assoc($usuarios);
$totalRows_usuarios = mysql_num_rows($usuarios);

if($totalRows_usuarios==0){
echo"<script type=\"text/javascript\">alert ('No puede eliminar el unico usuario. Debe existir al menos uno'); location.href='sistemenus.php?valor=u2&link=link6' </script>";
exit;
}


mysql_select_db($database_funeraria, $funeraria);
$query_usuarios2 = "SELECT * FROM seguridad where id=$id";
$usuarios2 = mysql_query($query_usuarios2, $funeraria) or die(mysql_error());
$row_usuarios2 = mysql_fetch_assoc($usuarios2);

 //conexion 
mysql_select_db($database_funeraria, $funeraria);
  

$sql="delete from seguridad where id='$id'";
$verificar=mysql_query($sql,$funeraria) or die(mysql_error());

if($verificar){
	if($_COOKIE["usr"]==$row_usuarios2["usuario"])
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='cerrarSesion.php' </script>";
	else
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='consultaUsuarios.php' </script>";
}
else
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='consultaUsuarios.php' </script>";
	


mysql_free_result($usuarios);
?>