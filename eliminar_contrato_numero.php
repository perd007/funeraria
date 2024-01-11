<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>
<?php

 
//validar usuario

if($validacion==true){
	if($eli==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='consulta_contrato_numero.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='consulta_contrato_numero.php'  </script>";
 exit;
}




$id=$_GET['id'];

mysql_select_db($database_funeraria, $funeraria);
$sql="delete  FROM contratos where id=$id";
$verificar=mysql_query($sql,$funeraria) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Datos Eliminado'); location.href='consulta_contrato_numero.php' </script>";
}
else{
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='consulta_contrato_numero.php' </script>";
	
}//fin de l primer else


?>