<?php require_once('Connections/funeraria.php'); ?>

<? include("login.php"); 

 
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
$query_clientes = "SELECT * FROM clientes where cedula='$_POST[cedula]' and id!='$_POST[id]'";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

 if($totalRows_clientes>=1){
  echo "<script type=\"text/javascript\">alert ('La cedula que ingreso ya es de otro cliente');  location.href='consulta_cliente.php' </script>";
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
 
 
 
 
 $updateSQL = sprintf("UPDATE clientes SET nombres=%s, cedula=%s, edad=%s, telefono=%s, ciudad=%s, direccion=%s, observaciones=%s WHERE cedula=%s",
                       GetSQLValueString($_POST['nombres'], "text"),
					   GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['ciudad'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['observaciones'], "text"),
                       GetSQLValueString($_POST['cedula2'], "int"));

  mysql_select_db($database_funeraria, $funeraria);
  $Result1 = mysql_query($updateSQL, $funeraria) or die(mysql_error());
   if($Result1){
 $CONTADOR1=1;
  }else{
 $CONTADOR1=0;
  exit;
  }
 
  
 
  for($i=1;$i<=10;$i++){ 
   
   
mysql_select_db($database_funeraria, $funeraria);
$query_familiar = "SELECT * FROM familiares where familiar='$_POST[cedula]' and puesto=$i";
$familiar = mysql_query($query_familiar, $funeraria) or die(mysql_error());
$row_familiar = mysql_fetch_assoc($familiar);
$totalRows_familiar = mysql_num_rows($familiar);

   
  if($_POST['familia'.$i]!="" and $_POST['nombres'.$i]!=""){ 

   $updateSQL2 = sprintf("UPDATE familiares SET  nombres=%s, edad=%s, dia=%s, mes=%s, ano=%s WHERE familiar=%s and puesto=%s",
                      
                       GetSQLValueString($_POST['nombres'.$i], "text"),
					   GetSQLValueString($_POST['edad'.$i], "int"),
                       GetSQLValueString($_POST['dia'.$i], "int"),
                       GetSQLValueString($_POST['mes'.$i], "text"),
                       GetSQLValueString($_POST['ano'.$i], "int"),
					   GetSQLValueString($_POST['cedula2'], "int"),
                       GetSQLValueString($i, "int"));
					   
		 mysql_select_db($database_funeraria, $funeraria);
  		$Result2 = mysql_query($updateSQL2, $funeraria) or die(mysql_error());
   		if($Result2){
			$CONTADOR2=5;
 		 }else{
 			$CONTADOR2=0;
  			exit;
  		}
					   
					   
}


if($_POST['familia'.$i]=="" and $_POST['nombres'.$i]!=""){

 $updateSQL2 = sprintf("INSERT INTO familiares ( nombres, edad, dia, mes, ano, puesto, familiar) VALUES ( %s, %s, %s, %s, %s,  %s, %s)",
                      
                       GetSQLValueString($_POST['nombres'.$i], "text"),
					    GetSQLValueString($_POST['edad'.$i], "int"),
                       GetSQLValueString($_POST['dia'.$i], "int"),
                       GetSQLValueString($_POST['mes'.$i], "text"),
                       GetSQLValueString($_POST['ano'.$i], "int"),
					    GetSQLValueString($i, "int"),
						GetSQLValueString($_POST['cedula'], "int"));
						
						
						
  mysql_select_db($database_funeraria, $funeraria);
  $Result2 = mysql_query($updateSQL2, $funeraria) or die(mysql_error());
   if($Result2){
 $CONTADOR2=5;
  }else{
 $CONTADOR2=0;
  exit;
  }

  
  }//fin del segundo if


if( $_POST['familia'.$i]!="" and $_POST['nombres'.$i]==""){
  


mysql_select_db($database_funeraria, $funeraria);
$sql="delete  FROM familiares where familiar='$_POST[cedula]' and puesto=$i";
$verificar=mysql_query($sql,$funeraria) or die(mysql_error());

if($Result2){
 $CONTADOR2=5;
  }else{
 $CONTADOR2=0;
  exit;
  }
}//fin del if



     }//fin del for 
 
 //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
  
     if($CONTADOR2==5 and $CONTADOR1==1){
  echo "<script type=\"text/javascript\">alert ('Datos Modificados');  location.href='consulta_general_clientes.php' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='consulta_general_clientes.php' </script>";
  exit;
  }
}



$cedula=$_GET['cedula'];

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula=$cedula ";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

 if($totalRows_clientes==0){
  echo "<script type=\"text/javascript\">alert ('Esta cedula no esta registrada');  location.href='consulta_cliente.php' </script>";
  }



mysql_select_db($database_funeraria, $funeraria);
$query_familiares1 = "SELECT * FROM familiares where puesto=1 and familiar=$cedula";
$familiares1 = mysql_query($query_familiares1, $funeraria) or die(mysql_error());
$row_familiares1 = mysql_fetch_assoc($familiares1);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares2 = "SELECT * FROM familiares where puesto=2 and familiar=$cedula ";
$familiares2 = mysql_query($query_familiares2, $funeraria) or die(mysql_error());
$row_familiares2 = mysql_fetch_assoc($familiares2);



mysql_select_db($database_funeraria, $funeraria);
$query_familiares3 = "SELECT * FROM familiares where puesto=3 and familiar=$cedula";
$familiares3 = mysql_query($query_familiares3, $funeraria) or die(mysql_error());
$row_familiares3 = mysql_fetch_assoc($familiares3);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares4 = "SELECT * FROM familiares where puesto=4 and familiar=$cedula";
$familiares4 = mysql_query($query_familiares4, $funeraria) or die(mysql_error());
$row_familiares4 = mysql_fetch_assoc($familiares4);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares5 = "SELECT * FROM familiares where puesto=5 and familiar=$cedula";
$familiares5 = mysql_query($query_familiares5, $funeraria) or die(mysql_error());
$row_familiares5 = mysql_fetch_assoc($familiares5);



mysql_select_db($database_funeraria, $funeraria);
$query_familiares6 = "SELECT * FROM familiares where puesto=6 and familiar=$cedula ";
$familiares6 = mysql_query($query_familiares6, $funeraria) or die(mysql_error());
$row_familiares6 = mysql_fetch_assoc($familiares6);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares7 = "SELECT * FROM familiares where puesto=7 and familiar=$cedula";
$familiares7 = mysql_query($query_familiares7, $funeraria) or die(mysql_error());
$row_familiares7 = mysql_fetch_assoc($familiares7);



mysql_select_db($database_funeraria, $funeraria);
$query_familiares7 = "SELECT * FROM familiares where puesto=7 and familiar=$cedula";
$familiares7 = mysql_query($query_familiares7, $funeraria) or die(mysql_error());
$row_familiares7 = mysql_fetch_assoc($familiares7);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares8 = "SELECT * FROM familiares where puesto=8 and familiar=$cedula";
$familiares8 = mysql_query($query_familiares8, $funeraria) or die(mysql_error());
$row_familiares8 = mysql_fetch_assoc($familiares8);



mysql_select_db($database_funeraria, $funeraria);
$query_familiares9 = "SELECT * FROM familiares where puesto=9 and familiar=$cedula ";
$familiares9 = mysql_query($query_familiares9, $funeraria) or die(mysql_error());
$row_familiares9 = mysql_fetch_assoc($familiares9);


mysql_select_db($database_funeraria, $funeraria);
$query_familiares10 = "SELECT * FROM familiares where puesto=10 and familiar=$cedula";
$familiares10 = mysql_query($query_familiares10, $funeraria) or die(mysql_error());
$row_familiares10 = mysql_fetch_assoc($familiares10);






?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.bordes {	border: medium solid #000000;
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
						if(document.form1.dia8.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia8').value)){
				alert('Solo puede ingresar numeros en el dia del octavo familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia9.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia9').value)){
				alert('Solo puede ingresar numeros en el dia del noveno familiar!!!');
				return false;
		   		}
				}
				if(document.form1.dia10.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dia10').value)){
				alert('Solo puede ingresar numeros en el dia del decimo familiar!!!');
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
							alert("Debe llenar todos los campos del septimo familiar");
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
if(document.form1.nombres8.value!="" || document.form1.edad8.value!=""  || document.form1.dia8.value!=""  || document.form1.ano8.value!="" && document.form1.nombres7.value!="" ){
				if(document.form1.nombres8.value==""){
					alert("Debe llenar todos los campos del octavo familiar");
						return false;
				}
				if(document.form1.edad8.value==""){
							alert("Debe llenar todos los campos del octavo familiar");
						return false;
				}
				if(document.form1.dia8.value==""){
							alert("Debe llenar todos los campos del octavo familiar");
						return false;
				}		
				if(document.form1.ano8.value==""){
							alert("Debe llenar todos los campos del octavo familiar");
						return false;
				}		
			}			
if(document.form1.nombres9.value!="" || document.form1.edad9.value!=""  || document.form1.dia9.value!=""  || document.form1.ano9.value!="" && document.form1.nombres8.value!="" ){
				if(document.form1.nombres9.value==""){
					alert("Debe llenar todos los campos del noveno familiar");
						return false;
				}
				if(document.form1.edad9.value==""){
							alert("Debe llenar todos los campos del noveno familiar");
						return false;
				}
				if(document.form1.dia9.value==""){
							alert("Debe llenar todos los campos del noveno familiar");
						return false;
				}		
				if(document.form1.ano9.value==""){
							alert("Debe llenar todos los campos del noveno familiar");
						return false;
				}		
			}			
if(document.form1.nombres10.value!="" || document.form1.edad10.value!=""  || document.form1.dia10.value!=""  || document.form1.ano10.value!="" && document.form1.nombres9.value!="" ){
				if(document.form1.nombres10.value==""){
					alert("Debe llenar todos los campos del decimo familiar");
						return false;
				}
				if(document.form1.edad10.value==""){
							alert("Debe llenar todos los campos del decimo familiar");
						return false;
				}
				if(document.form1.dia10.value==""){
							alert("Debe llenar todos los campos del decimo familiar");
						return false;
				}		
				if(document.form1.ano10.value==""){
							alert("Debe llenar todos los campos del decimo familiar");
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
				if(document.form1.edad8.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad8').value)){
				alert('Solo puede ingresar numeros en la edad del octavo familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad9.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad9').value)){
				alert('Solo puede ingresar numeros en la edad del noveno familiar!!!');
				return false;
		   		}
				}
				if(document.form1.edad10.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('edad10').value)){
				alert('Solo puede ingresar numeros en la edad del decimo familiar!!!');
				return false;
		   		}
				}
				
							
			
			
			
			
			
			
			
}
			
			
</script>
<body  >
<form method="post" name="form1" onsubmit="return validar()" action="<?php echo $editFormAction; ?>">
  <table width="376" border="0" align="center" cellpadding="1" cellspacing="2" class="bordes">
    <tr valign="baseline">
      <td colspan="2" align="right"  nowrap="nowrap" bgcolor="#CCCCCC"><div align="center"><strong>REGISTRO DE CLIENTES </strong></div></td>
    </tr>
    <tr valign="baseline">
      <td width="159" align="right" nowrap="nowrap">Nombres y Apellidos:</td>
      <td width="205"><input name="nombres" type="text" value="<?php echo $row_clientes['nombres']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cedula del cliente:</td>
      <td><input name="cedula" id="cedula" type="text" value="<?php echo $row_clientes['cedula']; ?>" size="15" maxlength="7" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Edad:</td>
      <td><input name="edad" id="edad" type="text" value="<?php echo $row_clientes['edad']; ?>" size="5" maxlength="2" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Telefono:</td>
      <td><input name="telefono" id="telefono" type="text" value="<?php echo $row_clientes['telefono']; ?>" size="20" maxlength="11" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ciudad de domicilio:</td>
      <td><input name="ciudad" type="text" value="<?php echo $row_clientes['ciudad']; ?>" size="50" maxlength="100" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="middle">Direccion:</td>
      <td><textarea name="direccion" cols="50" rows="3" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_clientes['direccion']; ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="middle">Observaciones:</td>
      <td><textarea name="observaciones" cols="50" rows="3" onkeydown="if(this.value.length &gt;= 300){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_clientes['observaciones']; ?></textarea></td>
    </tr>
  </table>
  <p>&nbsp; </p>

  <table width="569" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="bordes">
    <tr>
      <td colspan="6" bgcolor="#CCCCCC"><div align="center"><strong>FAMILIARES</strong></div></td>
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
      <td width="300"><input name="nombres1" type="text" id="nombres1" value="<?php echo $row_familiares1['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad1" type="text" id="edad1" value="<?php echo $row_familiares1['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia1" type="text" id="dia1" value="<?php echo $row_familiares1['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes1" id="mes1" >
            <?php 
		switch ($row_familiares1['mes']){
		case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano1" type="text" id="ano1" value="<?php echo $row_familiares1['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>2</strong></div></td>
      <td><input name="nombres2" type="text" id="nombres2" value="<?php echo $row_familiares2['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad2" type="text" id="edad2" value="<?php echo $row_familiares2['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia2" type="text" id="dia2" value="<?php echo $row_familiares2['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes2" id="mes2">
            <?php 
		switch ($row_familiares2['mes']){
		case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;

		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano2" type="text" id="ano2" value="<?php echo $row_familiares2['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>3</strong></div></td>
      <td><input name="nombres3" type="text" id="nombres3" value="<?php echo $row_familiares3['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad3" type="text" id="edad3" value="<?php echo $row_familiares3['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia3" type="text" id="dia3" value="<?php echo $row_familiares3['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes3" id="mes3">
            <?php 
		switch ($row_familiares3['mes']){
		case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano3" type="text" id="ano3" value="<?php echo $row_familiares3['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>4</strong></div></td>
      <td><input name="nombres4" type="text" id="nombres4" value="<?php echo $row_familiares4['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad4" type="text" id="edad4" value="<?php echo $row_familiares4['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia4" type="text" id="dia4" value="<?php echo $row_familiares4['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes4" id="mes4">
            <?php 
		switch ($row_familiares4['mes']){
	case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano4" type="text" id="ano4" value="<?php echo $row_familiares4['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>5</strong></div></td>
      <td><input name="nombres5" type="text" id="nombres5" value="<?php echo $row_familiares5['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad5" type="text" id="edad5" value="<?php echo $row_familiares5['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia5" type="text" id="dia5" value="<?php echo $row_familiares5['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes5" id="mes5">
            <?php 
		switch ($row_familiares5['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano5" type="text" id="ano5" value="<?php echo $row_familiares5['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>6</strong></div></td>
      <td><input name="nombres6" type="text" id="nombres6" value="<?php echo $row_familiares6['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad6" type="text" id="edad6" value="<?php echo $row_familiares6['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia6" type="text" id="dia6" value="<?php echo $row_familiares6['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes6" id="mes6">
            <?php 
		switch ($row_familiares6['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;

		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano6" type="text" id="ano6" value="<?php echo $row_familiares6['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center"><strong>7</strong></div></td>
      <td><input name="nombres7" type="text" id="nombres7" value="<?php echo $row_familiares7['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
          <input name="edad7" type="text" id="edad7" value="<?php echo $row_familiares7['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <input name="dia7" type="text" id="dia7" value="<?php echo $row_familiares7['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
          <select name="mes7" id="mes7">
            <?php 
		switch ($row_familiares7['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
			break;
		}
		 ?>
          </select>
      </div></td>
      <td><div align="center">
          <input name="ano7" type="text" id="ano7" value="<?php echo $row_familiares7['ano']; ?>" size="8" maxlength="4" />
      </div></td>
    </tr>
    <tr>
      <td align="center"><strong>8</strong></td>
      <td><input name="nombres8" type="text" id="nombres8" value="<?php echo $row_familiares8['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad8" type="text" id="edad8" value="<?php echo $row_familiares8['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <input name="dia8" type="text" id="dia8" value="<?php echo $row_familiares8['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <select name="mes8" id="mes8">
          <?php 
		switch ($row_familiares8['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
			break;
		}
		 ?>
        </select>
      </div></td>
      <td><input name="ano8" type="text" id="ano8" value="<?php echo $row_familiares8['ano']; ?>" size="8" maxlength="4" /></td>
    </tr>
    <tr>
      <td align="center"><strong>9</strong></td>
      <td><input name="nombres9" type="text" id="nombres9" value="<?php echo $row_familiares9['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad9" type="text" id="edad9" value="<?php echo $row_familiares9['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <input name="dia9" type="text" id="dia9" value="<?php echo $row_familiares9['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <select name="mes9" id="mes9">
          <?php 
		switch ($row_familiares9['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
			break;
		}
		 ?>
        </select>
      </div></td>
      <td><input name="ano9" type="text" id="ano9" value="<?php echo $row_familiares9['ano']; ?>" size="8" maxlength="4" /></td>
    </tr>
    <tr>
      <td align="center"><strong>10</strong></td>
      <td><input name="nombres10" type="text" id="nombres10" value="<?php echo $row_familiares10['nombres']; ?>" size="50" maxlength="50" /></td>
      <td><div align="center">
        <input name="edad10" type="text" id="edad10" value="<?php echo $row_familiares10['edad']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <input name="dia10" type="text" id="dia10" value="<?php echo $row_familiares10['dia']; ?>" size="6" maxlength="2" />
      </div></td>
      <td><div align="center">
        <select name="mes10" id="mes10">
          <?php 
		switch ($row_familiares10['mes']){
			case "ENE":
		echo "
        <option value='ENE' selected=selected>Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "FEB":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' selected=selected>Febrero</option>
        <option value='MAR'>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAR":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' selected=selected>Marzo</option>
        <option value='ABR'>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "ABR":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' selected=selected>Abril</option>
        <option value='MAY'>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "MAY":
		echo "
     <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' selected=selected>Mayo</option>
        <option value='JUN'>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUN":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' selected=selected>Junio</option>
        <option value='JUL'>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "JUL":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' selected=selected>Julio</option>
        <option value='AGO'>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "AGO":
		echo "
         <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' selected=selected>Agosto</option>
        <option value='SEP'>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "SEP":
		echo "
        <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' selected=selected>Septiembre</option>
        <option value='OCT'>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "OCT":
		echo "
          <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' selected=selected>Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "NOV":
		echo "
       <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV' selected=selected>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
		break;
		case "DIC":
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'  selected=selected>Diciembre</option>";
		break;
		default:
		echo "
      <option value='ENE' >Enero</option>
        <option value='FEB' >Febrero</option>
        <option value='MAR' >Marzo</option>
        <option value='ABR' >Abril</option>
        <option value='MAY' >Mayo</option>
        <option value='JUN' >Junio</option>
        <option value='JUL' >Julio</option>
        <option value='AGO' >Agosto</option>
        <option value='SEP' >Septiembre</option>
        <option value='OCT' >Octubre</option>
        <option value='NOV'>Noviembre</option>
        <option value='DIC'>Diciembre</option>";
			break;
		}
		 ?>
        </select>
      </div></td>
      <td><input name="ano10" type="text" id="ano10" value="<?php echo $row_familiares10['ano']; ?>" size="8" maxlength="4" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="545" border="0" align="center">
    <tr>
      <th scope="col"><input name="submit" type="submit" value="Modificar Datos" />
        <label>
        <a href="eliminarcliente.php?cedula=<?php echo $row_clientes['cedula']; ?>"><input type="button" name="Submit" value="Eliminar" /></a>
      </label></th>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="cedula2" value="<?php echo $row_clientes['cedula']; ?>">
	<input type="hidden" name="id" value="<?php echo $row_clientes['id']; ?>">
		<input type="hidden" name="familia1" value="<?php echo $row_familiares1['nombres']; ?>">
	<input type="hidden" name="familia2" value="<?php echo $row_familiares2['nombres']; ?>">
	<input type="hidden" name="familia3" value="<?php echo $row_familiares3['nombres']; ?>">
	<input type="hidden" name="familia4" value="<?php echo $row_familiares4['nombres']; ?>">
	<input type="hidden" name="familia5" value="<?php echo $row_familiares5['nombres']; ?>">
	<input type="hidden" name="familia6" value="<?php echo $row_familiares6['nombres']; ?>">
	<input type="hidden" name="familia7" value="<?php echo $row_familiares7['nombres']; ?>">
    <input type="hidden" name="familia8" value="<?php echo $row_familiares8['nombres']; ?>">
	<input type="hidden" name="familia9" value="<?php echo $row_familiares9['nombres']; ?>">
	<input type="hidden" name="familia10" value="<?php echo $row_familiares10['nombres']; ?>">

  </p>
</form>
<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiar);

mysql_free_result($familiares);
?>
