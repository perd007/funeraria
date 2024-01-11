<?php require_once('Connections/funeraria.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_clientes = 10;
$pageNum_clientes = 0;
if (isset($_GET['pageNum_clientes'])) {
  $pageNum_clientes = $_GET['pageNum_clientes'];
}
$startRow_clientes = $pageNum_clientes * $maxRows_clientes;

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes";
$query_limit_clientes = sprintf("%s LIMIT %d, %d", $query_clientes, $startRow_clientes, $maxRows_clientes);
$clientes = mysql_query($query_limit_clientes, $funeraria) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);

if (isset($_GET['totalRows_clientes'])) {
  $totalRows_clientes = $_GET['totalRows_clientes'];
} else {
  $all_clientes = mysql_query($query_clientes);
  $totalRows_clientes = mysql_num_rows($all_clientes);
}
$totalPages_clientes = ceil($totalRows_clientes/$maxRows_clientes)-1;

$queryString_clientes = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_clientes") == false && 
        stristr($param, "totalRows_clientes") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_clientes = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_clientes = sprintf("&totalRows_clientes=%d%s", $totalRows_clientes, $queryString_clientes);

 if($totalRows_clientes==0){
  echo "<script type=\"text/javascript\">alert ('Debe registrar clientes primero');  location.href='registro_clientes.php' </script>";
  }

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

<body>
<table width="681" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="bordes">
  <tr>
    <th colspan="4" bgcolor="#CCCCCC" scope="col">Consulta General de Contratos </th>
  </tr>
  <tr>
    <td width="325" bgcolor="#CCCCCC"><div align="center"><strong>Nombre</strong></div></td>
    <td width="120" bgcolor="#CCCCCC"><div align="center"><strong>Cedula</strong></div></td>
    <td width="100" bgcolor="#CCCCCC"><div align="center"><strong>Telefono</strong></div></td>
    <td width="56" bgcolor="#CCCCCC"><div align="center"><strong>VER</strong></div></td>
  </tr>
 
  <?php do { ?>
    <tr>
      <td><?php echo $row_clientes['nombres']; ?></td>
      <td><?php echo $row_clientes['cedula']; ?></td>
      <td><?php echo $row_clientes['telefono']; ?></td>
      <td bgcolor="#f2f0f0"><div align="center"><? echo "<a href='detalle_cliente.php?cedula=$row_clientes[cedula]'>IR</a>" ?></div></td>
    </tr>
    <?php } while ($row_clientes = mysql_fetch_assoc($clientes)); ?>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_clientes > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_clientes=%d%s", $currentPage, 0, $queryString_clientes); ?>">Primero</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_clientes > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_clientes=%d%s", $currentPage, max(0, $pageNum_clientes - 1), $queryString_clientes); ?>">Anterior</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_clientes < $totalPages_clientes) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_clientes=%d%s", $currentPage, min($totalPages_clientes, $pageNum_clientes + 1), $queryString_clientes); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_clientes < $totalPages_clientes) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_clientes=%d%s", $currentPage, $totalPages_clientes, $queryString_clientes); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($clientes);
?>
