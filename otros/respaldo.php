<?php require_once('Connections/funeraria.php'); ?>
<?php



mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes ";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

$maxRows_familiares = 7;
$pageNum_familiares = 0;
if (isset($_GET['pageNum_familiares'])) {
  $pageNum_familiares = $_GET['pageNum_familiares'];
}
$startRow_familiares = $pageNum_familiares * $maxRows_familiares;

mysql_select_db($database_funeraria, $funeraria);
$query_familiares = "SELECT * FROM familiares where familiar='$row_clientes[cedula]' ";
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
$query_contratos = "SELECT * FROM contratos ";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 30px;
	font-weight: bold;
}
.Estilo2 {font-size: 12px}
.Estilo4 {font-size: 18px}
.Estilo5 {font-size: 14px}
.Estilo6 {font-size: 14}
.Estilo7 {color: #FF0000}
.Estilo12 {font-size: 24px}
.Estilo13 {color: #FF0000; font-size: 24px; }
.Estilo16 {color: #0000FF}
.Estilo21 {color: #FFFF00}
.Estilo24 {color: #000000}
.Estilo27 {color: #00FF00}
.Estilo30 {color: #003300}
.Estilo35 {color: #666666}
.Estilo36 {font-size: 24px; font-weight: bold; color: #FF0000; }
.Estilo37 {color: #FFFFFF}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1202" height="1342" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFF00">
  <tr>
    <td colspan="4"><div align="center" class="Estilo1"></div></td>
  </tr>
  <tr>
    <td height="19" colspan="4"><div align="center" class="Estilo2"><span class="Estilo16"></span></div></td>
  </tr>
  <tr>
    <td height="19" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  
  <tr>
    <td height="23" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="26" colspan="3"> <span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['plan']; ?></span></td>
    <td width="281" height="26">&nbsp;</td>
  </tr>
  <tr>
    <td height="17" colspan="4"><div align="center"><span class="Estilo4"><span class="Estilo5"><span class="Estilo6"><span class="Estilo7"><span class="Estilo4"><span class="Estilo4"><span class="Estilo12"><span class="Estilo12"><span class="Estilo16"><span class="Estilo21"><span class="Estilo24"><span class="Estilo27"><span class="Estilo30"><span class="Estilo35"><span class="Estilo7"><span class="Estilo16"><span class="Estilo16"></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></div></td>
  </tr>
  <tr>
    <td height="13" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="13" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td width="343" height="13"><span class="Estilo16"></span></td>
    <td width="261"><span class="Estilo16"></span></td>
    <td width="317"><span class="Estilo16"></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14"><span class="Estilo16"></span></td>
    <td height="14">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="21" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="17" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="17" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="14" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="21" colspan="4">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['numero']; ?></span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['servicio']; ?></span></td>
    <td height="14"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_contratos['semanal']; ?></span></td>
    <td height="14"><span class="Estilo13 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row_contratos['mensual']; ?></strong></span></td>
  </tr>
  
  
  <tr>
    <td height="14"><span class="Estilo36 Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class=" Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class=" Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td height="14"><span class=" Estilo37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo16"></span></td>
    <td height="32"><span class="Estilo16"></span></td>
    <td height="32"><span class="Estilo16"></span></td>
    <td height="32"><span class="Estilo16"></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32" colspan="2"><?php echo $row_contratos['servicio']; ?></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32" colspan="2"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['nombres']; ?></span></td>
    <td height="32"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['edad']; ?></span></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32"><?php echo $row_clientes['ciudad']; ?></td>
    <td height="32" colspan="2"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_clientes['direccion']; ?></td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
    <td height="32">&nbsp;</td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
  <tr>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
    <td height="32"><span class="Estilo12"></span></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiares);
?>