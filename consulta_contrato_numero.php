<?php require_once('Connections/funeraria.php'); ?>
<?


mysql_select_db($database_funeraria, $funeraria);
$query_cli = "SELECT * FROM clientes";
$cli = mysql_query($query_cli, $funeraria) or die(mysql_error());
$row_cli = mysql_fetch_assoc($cli);
$totalRows_cli = mysql_num_rows($cli);

if($totalRows_cli==0){
	echo "<script type=\"text/javascript\">alert ('Debe registrar clientes primero'); location.href='registro_clientes.php' </script>";
    exit;
	}
mysql_select_db($database_funeraria, $funeraria);
$query_contra = "SELECT * FROM contratos";
$contra = mysql_query($query_contra, $funeraria) or die(mysql_error());
$row_contra = mysql_fetch_assoc($contra);
$totalRows_contra = mysql_num_rows($contra);
if($totalRows_contra==0){
	echo "<script type=\"text/javascript\">alert ('Debe registrar contrato primero'); location.href='generar_contratoo.php' </script>";
    exit;
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.bordes {border: medium solid #000000;
}
-->
</style>
</head>
<script language="javascript">

function validar(){
		if(document.form2.numero.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('numero').value)){
				alert('Solo puede ingresar numeros en el numero de contrato!!!');
				return false;
		   		}
				}
				
			
				
				if(document.form2.numero.value==""){
						alert("Debe Ingresar el numero de contrato");
						return false;
				}
				
				

}
			
			
</script>
<body>
<form id="form1" name="form2" method="get" onsubmit="return validar()" action="consulta_contrato_numero2.php" target="marco">
  <p>&nbsp;</p>
  <table width="259" border="0" align="center" cellpadding="1" cellspacing="2" class="bordes">
    <tr>
      <th colspan="2" bgcolor="#999999" scope="col">Generar Contrato por Numero </th>
    </tr>
    <tr>
      <th colspan="2" scope="col">Introduzca el numero de contrato </th>
    </tr>
    <tr>
      <td width="85" align="right"><strong> Numero:</strong></td>
      <td width="158"><label>
        <input type="text" name="numero" id="numero" />
      </label></td>
    </tr>
    <tr>
      <td colspan="2" align="center" bgcolor="#999999"><label>
        <input type="submit" name="button" id="button" value="BUSCAR" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
