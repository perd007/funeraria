<?php require_once('Connections/funeraria.php'); ?>
<?php

?>
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
?>
<?php
mysql_select_db($database_funeraria, $funeraria);
$query_cli = "SELECT * FROM clientes";
$cli = mysql_query($query_cli, $funeraria) or die(mysql_error());
$row_cli = mysql_fetch_assoc($cli);
$totalRows_cli = mysql_num_rows($cli);

if($totalRows_cli==0){
	echo "<script type=\"text/javascript\">alert ('Debe registrar clientes primero'); location.href='registro_clientes.php' </script>";
    exit;
	}
	
$cedula=$_GET["cedula"];

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_contratos = 10;
$pageNum_contratos = 0;
if (isset($_GET['pageNum_contratos'])) {
  $pageNum_contratos = $_GET['pageNum_contratos'];
}
$startRow_contratos = $pageNum_contratos * $maxRows_contratos;

mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where cliente='$cedula'";
$query_limit_contratos = sprintf("%s LIMIT %d, %d", $query_contratos, $startRow_contratos, $maxRows_contratos);
$contratos = mysql_query($query_limit_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);


	
	
if (isset($_GET['totalRows_contratos'])) {
  $totalRows_contratos = $_GET['totalRows_contratos'];
} else {
  $all_contratos = mysql_query($query_contratos);
  $totalRows_contratos = mysql_num_rows($all_contratos);
}
$totalPages_contratos = ceil($totalRows_contratos/$maxRows_contratos)-1;


if($totalRows_contratos==0){
	echo "<script type=\"text/javascript\">alert ('No existe un contrato con esta cedula'); location.href='consulta_contrato_cedula.php' </script>";
    exit;
	}


mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$row_contratos[cliente]'";
$clientes = mysql_query($query_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

$queryString_contratos = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_contratos") == false && 
        stristr($param, "totalRows_contratos") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_contratos = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_contratos = sprintf("&totalRows_contratos=%d%s", $totalRows_contratos, $queryString_contratos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar este Contrato? Si lo hace perdera toda la informacion del mismo');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}
		
}
//-->
</script>
<body>
<table width="681" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="bordes">
  <tr>
    <th colspan="6" bgcolor="#CCCCCC" scope="col">Consulta  de Contratos por Cedula </th>
  </tr>
  <tr>
    <td width="263" bgcolor="#CCCCCC"><div align="center"><strong>Cliente</strong></div></td>
    <td width="120" bgcolor="#CCCCCC"><div align="center"><strong>N&deg; de Contrato </strong></div></td>
    <td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Plan</strong></div></td>
    <td width="66" bgcolor="#CCCCCC"><div align="center"><strong>Modificar</strong></div></td>
    <td width="56" bgcolor="#CCCCCC"><div align="center"><strong>Eliminar</strong></div></td>
    <td width="56" bgcolor="#CCCCCC"><div align="center"><strong>Detalles</strong></div></td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_clientes['nombres']; ?></td>
      <td><?php echo $row_contratos['numero']; ?></td>
      <td><?php echo $row_contratos['plan']; ?></td>
      <td bgcolor="#f2f0f0"><div align="center"><? echo "<a href='modificar_contrato_cedula.php?id=$row_contratos[id]'>IR</a>" ?></div></td>
      <td bgcolor="#f2f0f0"><div align="center"><? echo "<a  onClick='return validar()' href='eliminar_contrato_cedula.php?id=$row_contratos[id]'>IR</a>" ?></div></td>
      <td bgcolor="#f2f0f0"><div align="center"><? echo "<a href='detalle_contrato_cedula.php?id=$row_contratos[id]'>IR</a>" ?></div></td>
    </tr>
    <?php } while ($row_contratos = mysql_fetch_assoc($contratos)); ?>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_contratos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_contratos=%d%s", $currentPage, 0, $queryString_contratos); ?>">Primero</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_contratos > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_contratos=%d%s", $currentPage, max(0, $pageNum_contratos - 1), $queryString_contratos); ?>">Anterior</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_contratos < $totalPages_contratos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_contratos=%d%s", $currentPage, min($totalPages_contratos, $pageNum_contratos + 1), $queryString_contratos); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_contratos < $totalPages_contratos) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_contratos=%d%s", $currentPage, $totalPages_contratos, $queryString_contratos); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($contratos);

mysql_free_result($clientes);
?>
