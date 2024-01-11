<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>

<?php

 
//validar usuario

if($validacion==true){
	if($eli==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='fondo.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='fondo.php'  </script>";
 exit;
}




$cedula=$_GET['cedula'];

mysql_select_db($database_funeraria, $funeraria);
$sql="delete  FROM clientes where cedula=$cedula";
$verificar=mysql_query($sql,$funeraria) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='fondo.php' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='fondo.php' </script>";
	
}//fin de l primer else


?>