<?php require_once('Connections/funeraria.php'); ?>
<?php 
 include("login.php"); ?>
<?php 
//validar usuario
if($validacion==true){
	if($reg==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Registros'); location.href='fondo.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='fondo.php'  </script>";
 exit;
}
?>
<?php 
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

mysql_select_db($database_funeraria, $funeraria);
$query_contra = "SELECT * FROM contratos where numero='$_POST[numero]'";
$contra = mysql_query($query_contra, $funeraria) or die(mysql_error());
$row_contra = mysql_fetch_assoc($contra);
$totalRows_contra = mysql_num_rows($contra);


if($totalRows_contra>=1){
  echo "<script type=\"text/javascript\">alert ('El numero de contrato ya existe');  location.href='' </script>";
  }
  
  $insertSQL = sprintf("INSERT INTO contratos ( plan, sindicato, numero, servicio, semanal, mensual, ciudad, dia, mes, ano, cliente) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                     
                       GetSQLValueString($_POST['plan'], "text"),
					   GetSQLValueString($_POST['sindicato'], "text"),
                       GetSQLValueString($_POST['numero'], "text"),
                       GetSQLValueString($_POST['servicio'], "double"),
                       GetSQLValueString($_POST['semanal'], "double"),
                       GetSQLValueString($_POST['anual'], "double"),
                       GetSQLValueString($_POST['ciudad'], "text"),
                       GetSQLValueString($_POST['dia'], "int"),
                       GetSQLValueString($_POST['mes'], "text"),
                       GetSQLValueString($_POST['ano'], "int"),
					    GetSQLValueString($_POST['cliente'], "int"));

  mysql_select_db($database_funeraria, $funeraria);
  $Result1 = mysql_query($insertSQL, $funeraria) or die(mysql_error());
  
      if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='' </script>";
  exit;
  }
 
}









mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
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
		
				
				
				
				if(document.form1.servicio.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('servicio').value)){
				alert('Solo puede ingresar numeros en el valor del servicio!!!');
				return false;
		   		}
				}
		
			if(document.form1.semanal.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('semanal').value)){
				alert('Solo puede ingresar numeros en el numero en el pago semanal!!!');
				return false;
		   		}
				}
				
				if(document.form1.anual.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('anual').value)){
				alert('Solo puede ingresar numeros en el pago anual!!!');
				return false;
		   		}
				}
				
				
				if(document.form1.dia.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia').value)){
				alert('Solo puede ingresar numeros en el dia!!!');
				return false;
		   		}
				}
		
			if(document.form1.ano.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('ano').value)){
				alert('Solo puede ingresar numeros en el numero en el A�o!!!');
				return false;
		   		}
				}
				
				

	
				if(document.form1.plan.value==""){
						alert("Debe Ingresar un numero de plan");
						return false;
				}
				if(document.form1.sindicato.value==""){
						alert("Debe Ingresar un sindicato");
						return false;
				}
				if(document.form1.numero.value==""){
						alert("Debe Ingresar un numero de contrato");
						return false;
				}
				if(document.form1.servicio.value==""){
						alert("Debe Ingresar un valor del servicio");
						return false;
				}
				
				if(document.form1.semanal.value==""){
						alert("Debe Ingresar un pago semanal");
						return false;
				}
				
				if(document.form1.anual.value==""){
						alert("Debe Ingresar un pago anual");
						return false;
				}
				if(document.form1.ciudad.value==""){
						alert("Debe Ingresar la ciudad");
						return false;
				}
			    if(document.form1.dia.value==""){
						alert("Debe Ingresar un dia");
						return false;
				}
				
			    if(document.form1.ano.value==""){
						alert("Debe Ingresar un A�o");
						return false;
				}

			
}
			
			
</script>

<body>
<form id="form1" name="form1" method="post" action="<?php echo $editFormAction; ?>">
  <table width="588" border="0" align="center" cellpadding="2" cellspacing="2" class="bordes">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row">CONTRATO</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Por favor ingrese los siguinetes datos </th>
    </tr>
    <tr>
      <th scope="row"><div align="left">CLIENTE</div></th>
      <td><label>
        <select name="cliente" id="cliente">
          <?php
do {  
?>
          <option value="<?php echo $row_clientes['cedula']?>"<?php if (!(strcmp($row_clientes['cedula'], $row_clientes['cedula']))) {echo "selected=\"selected\"";} ?>><?php echo $row_clientes['nombres']?></option>
          <?php
} while ($row_clientes = mysql_fetch_assoc($clientes));
  $rows = mysql_num_rows($clientes);
  if($rows > 0) {
      mysql_data_seek($clientes, 0);
	  $row_clientes = mysql_fetch_assoc($clientes);
  }
?>
        </select>
      </label></td>
    </tr>
    <tr>
      <th width="249" scope="row"><div align="left">PLAN</div></th>
      <td width="317"><label>
        <input name="plan" type="text" id="plan" maxlength="11" />
      </label></td>
    </tr>
    <tr>
      <th align="left" scope="row">SINDICATO</th>
      <td><label for="sindicato"></label>
      <input name="sindicato" type="text" id="sindicato" maxlength="20" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CONTRATO N&deg; </div></th>
      <td><input name="numero" type="text" id="numero" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">VALOR SERVICIO </div></th>
      <td><input name="servicio" type="text" id="servicio" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">PAGO SEMANAL </div></th>
      <td><input name="semanal" type="text" id="semanal" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">PAGO ANUAL </div></th>
      <td><input name="anual" type="text" id="anual" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CIUDAD</div></th>
      <td><textarea name="ciudad" cols="50" rows="5" id="ciudad" onKeyDown="if(this.value.length &gt;= 300){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">DIA</div></th>
      <td><input name="dia" type="text" id="dia" size="10" maxlength="2" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">MES</div></th>
      <td><select name="mes" id="mes">
       <option value="ENE" selected="selected">Enero</option>
          <option value="FEB">Febrero</option>
          <option value="MAR">Marzo</option>
          <option value="ABR">Abril</option>
          <option value="MAY">Mayo</option>
          <option value="JUN">Junio</option>
          <option value="JUL">Julio</option>
          <option value="AGO">Agosto</option>
          <option value="SEP">Septiembre</option>
          <option value="OCT">Octubre</option>
          <option value="NOV">Noviembre</option>
          <option value="DIC">Diciembre</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">A&Ntilde;O</div></th>
      <td><input name="ano" type="text" id="ano" size="10" maxlength="4" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="REGISTRAR" />
      </label></th>
    </tr>
  </table>
   <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($contra);
?>
