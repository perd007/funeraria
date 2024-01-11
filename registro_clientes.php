<?php require_once('Connections/funeraria.php'); ?>
<? include("login.php"); ?>
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


mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$_POST[cedula]'";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

 if($totalRows_clientes>=1){
  echo "<script type=\"text/javascript\">alert ('La cedula que ingreso ya es de otro cliente');  location.href='' </script>";
  }

//conteo familia
if($_POST['nombres1']!=""){ $familia=1; }
if($_POST['nombres2']!=""){ $familia=2; }
if($_POST['nombres3']!=""){ $familia=3; }
if($_POST['nombres4']!=""){ $familia=4; }
if($_POST['nombres5']!=""){ $familia=5; }
if($_POST['nombres6']!=""){ $familia=6; }
if($_POST['nombres7']!=""){ $familia=7; }
if($_POST['nombres8']!=""){ $familia=8; }
if($_POST['nombres9']!=""){ $familia=9; }
if($_POST['nombres10']!=""){ $familia=10; }

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {

  $insertSQL = sprintf("INSERT INTO clientes (nombres, cedula, edad, telefono, ciudad, direccion, observaciones) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombres'], "text"),
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['ciudad'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
					   GetSQLValueString($_POST['observaciones'], "text"));

  mysql_select_db($database_funeraria, $funeraria);
  $Result1 = mysql_query($insertSQL, $funeraria) or die(mysql_error());
   if($Result1){
 $CONTADOR1=1;
  }else{
 $CONTADOR1=0;
  exit;
  }
  
for($i=1;$i<= $familia;$i++){  


$insertSQ2 = sprintf("INSERT INTO familiares ( nombres, edad, dia, mes, ano, puesto, familiar) VALUES ( %s, %s, %s, %s, %s,  %s, %s)",
                      
                       GetSQLValueString($_POST['nombres'.$i], "text"),
					   GetSQLValueString($_POST['edad'.$i], "int"),
                       GetSQLValueString($_POST['dia'.$i], "int"),
                       GetSQLValueString($_POST['mes'.$i], "text"),
                       GetSQLValueString($_POST['ano'.$i], "int"),
					    GetSQLValueString($i, "int"),
						GetSQLValueString($_POST['cedula'], "int"));

  mysql_select_db($database_funeraria, $funeraria);
  $Result2 = mysql_query($insertSQ2, $funeraria) or die(mysql_error());
  if($Result2){
 $CONTADOR2=5;
  }else{
 $CONTADOR2=0;
  exit;
  }
  
  }//fin del for
  //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
     if($CONTADOR2==5 and $CONTADOR1==1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='' </script>";
  exit;
  }
  
}
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
</head>
<script language="javascript">

function validar(){
		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula!!!');
				return false;
		   		}
				}
				
				if(document.form1.telefono.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('telefono').value)){
				alert('Solo puede ingresar numeros en el numero de telefono!!!');
				return false;
		   		}
				}
				
				if(document.form1.edad.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad').value)){
				alert('Solo puede ingresar numeros en la edad!!!');
				return false;
		   		}
				}
		
				
				
	
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula del cliente");
						return false;
				}
				if(document.form1.nombres.value==""){
						alert("Debe Ingresar los nombres del cliente");
						return false;
				}
				if(document.form1.ciudad.value==""){
						alert("Debe Ingresar la ciudad");
						return false;
				}
				if(document.form1.direccion.value==""){
						alert("Debe Ingresar la direccion");
						return false;
				}
	
			





if(document.form1.dia1.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia1').value)){
				alert('Solo puede ingresar numeros en el dia del primer familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia2.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia2').value)){
				alert('Solo puede ingresar numeros en el dia del segundo familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia3.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia3').value)){
				alert('Solo puede ingresar numeros en el dia del tercer familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia4.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia4').value)){
				alert('Solo puede ingresar numeros en el dia del cuarto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia5.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia5').value)){
				alert('Solo puede ingresar numeros en el dia del quinto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia6.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia6').value)){
				alert('Solo puede ingresar numeros en el dia del sexto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia7.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia7').value)){
				alert('Solo puede ingresar numeros en el dia del septimo familiar!!!');
				return false;
		   		}
				}
				
				
		

				
				if(document.form1.nombres1.value==""){
						alert("Debe Ingresar al menos el primer familiar");
						return false;
				}
				
				
				
	        if(document.form1.nombres1.value!="" || document.form1.edad1.value!=""  || document.form1.dia1.value!=""  || document.form1.ano1.value!=""  ){
				if(document.form1.nombres1.value==""){
					alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.edad1.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia1.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}		
				if(document.form1.ano1.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}		
			}
			
			
			
			if(document.form1.nombres2.value!="" || document.form1.edad2.value!="" || document.form1.dia2.value!=""  || document.form1.ano2.value!="" && document.form1.nombres1.value!="" ){
				if(document.form1.nombres2.value==""){
					alert("Debe llenar todos los campos del segundo familiar");
						return false;
				}
				if(document.form1.edad2.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia2.value==""){
							alert("Debe llenar todos los campos del segundo familiar");
						return false;
				}		
				if(document.form1.ano2.value==""){
							alert("Debe llenar todos los campos del segundo familiar");
						return false;
				}		
			}
			
			
			
			if(document.form1.nombres3.value!="" || document.form1.edad3.value!="" || document.form1.dia3.value!=""  || document.form1.ano3.value!="" && document.form1.nombres2.value!="" ){
				if(document.form1.nombres3.value==""){
					alert("Debe llenar todos los campos del tercer familiar");
						return false;
				}
				if(document.form1.edad3.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia3.value==""){
							alert("Debe llenar todos los campos del tercer familiar");
						return false;
				}		
				if(document.form1.ano3.value==""){
							alert("Debe llenar todos los campos del tercer familiar");
						return false;
				}		
			}
			
			

if(document.form1.nombres4.value!="" || document.form1.edad4.value!=""  || document.form1.dia4.value!=""  || document.form1.ano4.value!="" && document.form1.nombres3.value!="" ){
				if(document.form1.nombres4.value==""){
					alert("Debe llenar todos los campos del cuarto familiar");
						return false;
				}
				if(document.form1.edad4.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia4.value==""){
							alert("Debe llenar todos los campos del cuarto familiar");
						return false;
				}		
				if(document.form1.ano4.value==""){
							alert("Debe llenar todos los campos del cuarto familiar");
						return false;
				}		
			}


if(document.form1.nombres5.value!="" || document.form1.edad5.value!="" || document.form1.dia5.value!=""  || document.form1.ano5.value!="" && document.form1.nombres4.value!="" ){
				if(document.form1.nombres5.value==""){
					alert("Debe llenar todos los campos del quinto familiar");
						return false;
				}
				if(document.form1.edad5.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia5.value==""){
							alert("Debe llenar todos los campos del quinto familiar");
						return false;
				}		
				if(document.form1.ano5.value==""){
							alert("Debe llenar todos los campos del quinto familiar");
						return false;
				}		
			}

if(document.form1.nombres6.value!="" || document.form1.edad6.value!="" || document.form1.dia6.value!=""  || document.form1.ano6.value!="" && document.form1.nombres5.value!="" ){
				if(document.form1.nombres6.value==""){
					alert("Debe llenar todos los campos del sexto familiar");
						return false;
				}
				if(document.form1.edad6.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia6.value==""){
							alert("Debe llenar todos los campos del sexto familiar");
						return false;
				}		
				if(document.form1.ano6.value==""){
							alert("Debe llenar todos los campos del sexto familiar");
						return false;
				}		
			}
			
if(document.form1.nombres7.value!="" || document.form1.edad7.value!=""  || document.form1.dia7.value!=""  || document.form1.ano7.value!="" && document.form1.nombres6.value!="" ){
				if(document.form1.nombres7.value==""){
					alert("Debe llenar todos los campos del septimo familiar");
						return false;
				}
				if(document.form1.edad7.value==""){
							alert("Debe llenar todos los campos del primer familiar");
						return false;
				}
				if(document.form1.dia7.value==""){
							alert("Debe llenar todos los campos del septimo familiar");
						return false;
				}		
				if(document.form1.ano7.value==""){
							alert("Debe llenar todos los campos del septimo familiar");
						return false;
				}		
			}			
			
			
			
if(document.form1.edad1.value!=""){
			 var filtro = /^(\d)+$/i; 
		      if (!filtro.test(document.getElementById('edad1').value)){
				alert('Solo puede ingresar numeros en la edad del primer familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad2.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad2').value)){
				alert('Solo puede ingresar numeros en la edad del segundo familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad3.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad3').value)){
				alert('Solo puede ingresar numeros en la edad del tercer familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad4.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad4').value)){
				alert('Solo puede ingresar numeros en la edad del cuarto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad5.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad5').value)){
				alert('Solo puede ingresar numeros en la edad del quinto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad6.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad6').value)){
				alert('Solo puede ingresar numeros en la edad del sexto familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad7.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad7').value)){
				alert('Solo puede ingresar numeros en la edad del septimo familiar!!!');
				return false;
		   		}
				}
				
							
			
			
			
			
			
			
			
}
			
			
</script>
<body>
<form method="post" name="form1" onsubmit="return validar()" action="<?php echo $editFormAction; ?>">
  <table width="376" border="0" align="center" cellpadding="1" cellspacing="2" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="right"  nowrap bgcolor="#CCCCCC"><div align="center"><strong>REGISTRO DE CLIENTES </strong></div></td>
    </tr>
    <tr valign="baseline">
      <td width="159" align="right" nowrap>Nombres y Apellidos:</td>
      <td width="205"><input name="nombres" type="text" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Cedula del cliente:</td>
      <td><input name="cedula" id="cedula" type="text" value="" size="15" maxlength="7"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Edad:</td>
      <td><input name="edad" id="edad" type="text" value="" size="5" maxlength="2"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Telefono:</td>
      <td><input name="telefono" id="telefono" type="text" value="" size="20" maxlength="11"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Ciudad de domicilio:</td>
      <td><input name="ciudad" type="text" value="" size="50" maxlength="100"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" valign="middle">Direccion:</td>
      <td><textarea name="direccion" cols="50" rows="3" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right" valign="middle">Observaciones:</td>
      <td><textarea name="observaciones" cols="50" rows="3" onKeyDown="if(this.value.length &gt;= 300){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <table width="569" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="bordes">
    <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="center"><strong>REGISTRO DE FAMILIARES</strong></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>NOMBRES Y APELLIDOS </strong></div></td>
      <td width="37"><strong>EDAD</strong></td>
      <td width="37"><div align="center"><strong>DIA</strong></div></td>
      <td width="108"><div align="center"><strong>MES</strong></div></td>
      <td width="53"><div align="center"><strong>A&Ntilde;O</strong></div></td>
    </tr>
    <tr>
      <td width="34"><div align="center"><strong>1</strong></div></td>
      <td width="300"><input name="nombres1" type="text" id="nombres1" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad1" type="text" id="edad1" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia1" type="text" id="dia1" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes1" id="mes1">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano1" type="text" id="ano1" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>2</strong></div></td>
      <td><input name="nombres2" type="text" id="nombres2" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad2" type="text" id="edad2" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia2" type="text" id="dia2" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes2" id="mes2">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano2" type="text" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>3</strong></div></td>
      <td><input name="nombres3" type="text" id="nombres3" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad3" type="text" id="edad3" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia3" type="text" id="dia3" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes3" id="mes3">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano3" type="text" id="ano3" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>4</strong></div></td>
      <td><input name="nombres4" type="text" id="nombres4" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad4" type="text" id="edad4" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia4" type="text" id="dia4" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes4" id="mes4">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano4" type="text" id="ano4" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>5</strong></div></td>
      <td><input name="nombres5" type="text" id="nombres5" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad5" type="text" id="edad5" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia5" type="text" id="dia5" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes5" id="mes5">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano5" type="text" id="ano5" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>6</strong></div></td>
      <td><input name="nombres6" type="text" id="nombres6" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad6" type="text" id="edad6" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia6" type="text" id="dia6" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes6" id="mes6">
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
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano6" type="text" id="ano6" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>7</strong></div></td>
      <td><input name="nombres7" type="text" id="nombres7" value="" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad7" type="text" id="edad7" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia7" type="text" id="dia7" value="" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes7" id="mes7">
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
          </select>
      </div></td>
      <td align="center"><div align="center">
          <input name="ano7" type="text" id="ano7" value="" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td align="center"><strong>8</strong></td>
      <td><input name="nombres8" type="text" id="nombres8" value="" size="50" maxlength="50" /></td>
      <td align="center"><input name="edad8" type="text" id="edad8" value="" size="6" maxlength="2" /></td>
      <td><input name="dia8" type="text" id="dia8" value="" size="6" maxlength="2" /></td>
      <td align="center"><select name="mes8" id="mes8">
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
      <td align="center"><input name="ano8" type="text" id="ano2" value="" size="8" maxlength="4" /></td>
    </tr>
    <tr>
      <td align="center"><strong>9</strong></td>
      <td><input name="nombres9" type="text" id="nombres9" value="" size="50" maxlength="50" /></td>
      <td align="center"><input name="edad9" type="text" id="edad9" value="" size="6" maxlength="2" /></td>
      <td><input name="dia9" type="text" id="dia9" value="" size="6" maxlength="2" /></td>
      <td align="center"><select name="mes9" id="mes9">
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
      <td align="center"><input name="ano9" type="text" id="ano8" value="" size="8" maxlength="4" /></td>
    </tr>
    <tr>
      <td align="center"><strong>10</strong></td>
      <td><input name="nombres10" type="text" id="nombres10" value="" size="50" maxlength="50" /></td>
      <td align="center"><input name="edad10" type="text" id="edad10" value="" size="6" maxlength="2" /></td>
      <td><input name="dia10" type="text" id="dia10" value="" size="6" maxlength="2" /></td>
      <td align="center"><select name="mes10" id="mes10">
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
      <td align="center"><input name="ano10" type="text" id="ano9" value="" size="8" maxlength="4" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="545" border="0" align="center">
    <tr>
      <th scope="col"><input name="submit" type="submit" value="Guardar Datos" /></th>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>
    <input type="hidden" name="MM_insert" value="form1">
  </p>
</form>
<p>&nbsp;</p>


<p>&nbsp;</p>
</body>
</html>
