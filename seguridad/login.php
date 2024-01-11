<?php require_once('Connections/funeraria.php'); ?>
<?php 
$validacion=false;
$usuario;
$clave;
$modi;
$eli;
$cons;
$reg;
Admi;


//verificar si existen la cookis
if(isset($HTTP_COOKIE_VARS["usr"]) && isset($HTTP_COOKIE_VARS["clv"]))
{

	mysql_select_db($database_funeraria, $funeraria);
	$result = mysql_query("SELECT * FROM seguridad WHERE usuario='".$HTTP_COOKIE_VARS["usr"]."' AND clave='".$HTTP_COOKIE_VARS["clv"]."'") or die(mysql_error());

	if($row = mysql_fetch_array($result)){
	
		//generamos nuevas cookis para aumentar su tiempo de destruccion
		setcookie("usr",$HTTP_COOKIE_VARS["usr"],time()+7776000);
		setcookie("clv",$HTTP_COOKIE_VARS["clv"],time()+7776000);
		$validacion = true;
		$modi=$row["modificar"];
		$eli=$row["eliminar"];
		$cons=$row["consultar"];
		$reg=$row["registrar"];
		$Admi=$row["administrar"];
	}
	else
	{
		//Destruimos las cookies.
		setcookie("usr","x",time()-3600);
		setcookie("clv","x",time()-3600);
		echo "<script type=\"text/javascript\">alert ('Error con la validacion');  location.href='index.php' </script>";
		exit;
	}
	
mysql_free_result($result);
}

?>