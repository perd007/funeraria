<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>
<?php 
//validar usuario
if($validacion==true){
	if($cons==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Consultas'); location.href='fondo.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='fondo.php'  </script>";
 exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<style type="text/css">
<!--
.bordes {
	border: medium solid #000000;
}
-->
</style>
<script language="javascript">

function validar(){
		if(document.form2.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula!!!');
				return false;
		   		}
				}
				
			
				
				if(document.form2.cedula.value==""){
						alert("Debe Ingresar la cedula");
						return false;
				}
				
				

}
			
			
</script>
<body>
<form id="form1" name="form2" method="post" onsubmit="return validar()" action="consulta_cliente2.php" target="marco">
  <p>&nbsp;</p>
  <table width="259" border="0" align="center" cellpadding="1" cellspacing="2" class="bordes">
    <tr>
      <th colspan="2" bgcolor="#999999" scope="col">Consulta de Clientes </th>
    </tr>
    <tr>
      <th colspan="2" scope="col">Introduzca la Cedula del Cliente</th>
    </tr>
    <tr>
      <td width="85" align="right"><strong>Cedula Nº:</strong></td>
      <td width="158"><label>
        <input type="text" name="cedula" id="cedula" />
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