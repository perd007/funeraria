<?php require_once('Connections/funeraria.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$_POST[cedula]'";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

$maxRows_familiares = 10;
$pageNum_familiares = 0;
if (isset($_GET['pageNum_familiares'])) {
  $pageNum_familiares = $_GET['pageNum_familiares'];
}
$startRow_familiares = $pageNum_familiares * $maxRows_familiares;

mysql_select_db($database_funeraria, $funeraria);
$query_familiares = "SELECT * FROM familiares where familiar='$_POST[cedula]'";
$query_limit_familiares = sprintf("%s LIMIT %d, %d", $query_familiares, $startRow_familiares, $maxRows_familiares);
$familiares = mysql_query($query_limit_familiares, $funeraria) or die(mysql_error());
$row_familiares = mysql_fetch_assoc($familiares);

if (isset($_GET['totalRows_familiares'])) {
  $totalRows_familiares = $_GET['totalRows_familiares'];
} else {
  $all_familiares = mysql_query($query_familiares);
  $totalRows_familiares = mysql_num_rows($all_familiares);
}
$totalPages_familiares = ceil($totalRows_familiares/$maxRows_familiares)-1;

mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where cliente='$_POST[cedula]'";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CARNET PARA AFILIADOS</title>
<style type="text/css">
.negrita {
	font-weight: bold;
	font-size: 12px;
}
.bordes {
	border: thick groove #000;
}
.medio {
	border-right-width: medium;
	border-right-style: groove;
	border-right-color: #000;
}

.letras {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	
}
</style>
</head>

<body onload="window.print();">
<table width="579" height="363" border="0" align="center" cellpadding="0" cellspacing="0" class="bordes">
  <tr class="medio">
    <td height="15" colspan="3" class="medio"><div class="negrita">Funeraria Amazonas, C.A</div></td>
    <td width="281" rowspan="8" valign="top"><table width="281" height="359" border="0" align="left">
      <tr>
        <td width="275" height="39" align="left"><span class="negrita"><img src="imagenes/banner_c11.jpg" width="258" height="34" /></span></td>
      </tr>
      <tr>
        <td height="290" align="left"><img src="imagenes/logo.jpg" width="248" height="248" /></td>
      </tr>
      <tr>
        <td height="21" align="center" valign="bottom" class="negrita"><p>Telefono: 0248-5214108</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="116" height="132" valign="top" ><img src="imagenes/logo.jpg" width="116" height="113" /></td>
    <td width="53" align="center" valign="top" class="negrita" ><p>Plan de Prevision Familiar</p></td>
    <td width="117" valign="top" class="medio" >
    <table width="106" height="116" border="1" cellpadding="0" cellspacing="0"  bordercolor="#000000">
      <tr>
        <td width="124" height="116" align="center" >FOTO</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="19" colspan="3" class="medio"><span class="negrita">Afiliado:</span><?php echo $row_clientes['nombres']; ?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" class="medio"><span class="negrita">Sindicato:</span><?php echo $row_contratos['sindicato']; ?></td>
  </tr>
  <tr>
    <td height="19" colspan="3" class="medio"><span class="negrita">C.I.</span>:<?php echo $row_clientes['cedula']; ?></td>
  </tr>
  <tr>
    <td height="15" colspan="3" class="medio"><span class="negrita">Carga Familiar:</span></td>
  </tr>
  <tr>
  <td height="132" colspan="3" valign="top" class="medio">
    <?php do { ?>
      <table border="0" cellpadding="0" cellspacing="0"><tr> <td width="140" ><span class="letras"><?php echo $row_familiares['nombres']; ?></span></td></tr></table>
      <?php } while ($row_familiares = mysql_fetch_assoc($familiares)); ?>
   </td>
 </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiares);

mysql_free_result($contratos);
?>
