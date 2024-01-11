<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>
<?php 
//validar usuario
if($validacion==true){
	if($modi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Modificaciones'); location.href='fondo.php' </script>";
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

mysql_select_db($database_funeraria, $funeraria);
$query_contra = "SELECT * FROM contratos where numero='$_POST[numero]' and id!='$_POST[id]'";
$contra = mysql_query($query_contra, $funeraria) or die(mysql_error());
$row_contra = mysql_fetch_assoc($contra);
$totalRows_contra = mysql_num_rows($contra);


if($totalRows_contra>=1){
  echo "<script type=\"text/javascript\">alert ('El numero de contrato ya existe');  location.href='' </script>";
  }

  $updateSQL = sprintf("UPDATE contratos SET plan=%s, sindicato=%s, numero=%s, servicio=%s, semanal=%s, mensual=%s, ciudad=%s, dia=%s, mes=%s, ano=%s, cliente=%s WHERE id=%s",
                       GetSQLValueString($_POST['plan'], "text"),
					    GetSQLValueString($_POST['sindicato'], "text"),
                       GetSQLValueString($_POST['numero'], "text"),
                       GetSQLValueString($_POST['servicio'], "double"),
                       GetSQLValueString($_POST['semanal'], "double"),
                       GetSQLValueString($_POST['mensual'], "double"),
                       GetSQLValueString($_POST['ciudad'], "text"),
                       GetSQLValueString($_POST['dia'], "int"),
                       GetSQLValueString($_POST['mes'], "text"),
                       GetSQLValueString($_POST['ano'], "int"),
                       GetSQLValueString($_POST['cliente'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_funeraria, $funeraria);
  $Result1 = mysql_query($updateSQL, $funeraria) or die(mysql_error());
  
      if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='consulta_contrato_numero2.php?numero=$_POST[numero]' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='consulta_contrato_numero2.php?numero=$_POST[numero]' </script>";
  exit;
  }
}





$id=$_GET["id"];
mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where id=$id";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.bordes {
	border: medium solid #000000;
}
-->
</style>
<script language="javascript">

function validar(){
		if(document.form1.plan.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('plan').value)){
				alert('Solo puede ingresar numeros en el plan!!!');
				return false;
		   		}
				}
				
				if(document.form1.numero.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('numero').value)){
				alert('Solo puede ingresar numeros en el numero de contrato!!!');
				return false;
		   		}
				}
				
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
				alert('Solo puede ingresar numeros en el numero en el Año!!!');
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
						alert("Debe Ingresar un Año");
						return false;
				}

			
}
			
			
</script>

</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="495" border="0" align="center" cellpadding="2" cellspacing="2" class="bordes">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row">CONTRATO</th>
    </tr>
    <tr>
      <th colspan="2" scope="row">Por favor ingrese los siguientes datos </th>
    </tr>
    <tr>
      <th scope="row"><div align="left">CLIENTE</div></th>
      <td><label>
        <select name="cliente" id="cliente">
          <?php
do {  
?>
          <option value="<?php echo $row_clientes['cedula']?>"<?php if (!(strcmp($row_clientes['cedula'], $row_contra['cliente']))) {echo "selected=\"selected\"";} ?>><?php echo $row_clientes['nombres']?></option>
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
      <th width="149" scope="row"><div align="left">PLAN</div></th>
      <td width="324"><label>
        <input name="plan" type="text" id="plan" value="<?php echo $row_contratos['plan']; ?>" maxlength="11" />
      </label></td>
    </tr>
    <tr>
      <th align="left" scope="row">SINDICATO</th>
      <td><label for="sindicato"></label>
        <input name="sindicato" type="text" id="sindicato" value="<?php echo $row_contratos['sindicato']; ?>" maxlength="20" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CONTRATO N&deg; </div></th>
      <td><input name="numero" type="text" id="numero" value="<?php echo $row_contratos['numero']; ?>" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">VALOR SERVICIO </div></th>
      <td><input name="servicio" type="text" id="servicio" value="<?php echo $row_contratos['servicio']; ?>" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">PAGO SEMANAL </div></th>
      <td><input name="semanal" type="text" id="semanal" value="<?php echo $row_contratos['semanal']; ?>" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">PAGO ANUAL </div></th>
      <td><input name="anual" type="text" id="anual" value="<?php echo $row_contratos['mensual']; ?>" maxlength="11" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">CIUDAD</div></th>
      <td><textarea name="ciudad" cols="50" rows="5" id="ciudad" onKeyDown="if(this.value.length &gt;= 300){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_contratos['ciudad']; ?></textarea></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">DIA</div></th>
      <td><input name="dia" type="text" id="dia" value="<?php echo $row_contratos['dia']; ?>" size="10" maxlength="2" /></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">MES</div></th>
      <td><select name="mes" id="mes">
        <option value="Enero" selected="selected" <?php if (!(strcmp("Enero", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Enero</option>
       <option value="ENE" selected="selected" <?php if (!(strcmp("ENE", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Enero</option>
        <option value="FEB" <?php if (!(strcmp("FEB", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Febrero</option>
        <option value="MAR" <?php if (!(strcmp("MAR", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Marzo</option>
        <option value="ABR" <?php if (!(strcmp("ABR", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Abril</option>
        <option value="MAY" <?php if (!(strcmp("MAY", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Mayo</option>
        <option value="JUN" <?php if (!(strcmp("JUN", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Junio</option>
        <option value="Julio" <?php if (!(strcmp("JUL", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Julio</option>
        <option value="AGO" <?php if (!(strcmp("AGO", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Agosto</option>
        <option value="SEP" <?php if (!(strcmp("SEP", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Septiembre</option>
        <option value="OCT" <?php if (!(strcmp("OCT", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Octubre</option>
        <option value="NOV" <?php if (!(strcmp("NOV", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Noviembre</option>
        <option value="DIC" <?php if (!(strcmp("DIC", $row_contratos['mes']))) {echo "selected=\"selected\"";} ?>>Diciembre</option>
      </select></td>
    </tr>
    <tr>
      <th scope="row"><div align="left">A&Ntilde;O</div></th>
      <td><input name="ano" type="text" id="ano" value="<?php echo $row_contratos['ano']; ?>" size="10" maxlength="4" /></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><label>
        <input type="submit" name="Submit" value="MODIFICAR DATOS" />
      </label></th>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_contratos['id']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($contratos);

mysql_free_result($clientes);
?>
