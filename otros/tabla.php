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
$row_fam = mysql_fetch_assoc($familiares);

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
</head>
<style type="text/css">
<!--

.Estilo36 {font-size: 24px; font-weight: bold; color: #000000; }

-->
</style>
<body>
<table width="1707" height="2711" border="0" align="center" background="imagenes/contrato.jpg">
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th width="153" height="31" class="Estilo36" scope="col">&nbsp;</th>
    <th width="116" class="Estilo36" scope="col">&nbsp;</th>
    <th width="199" class="Estilo36" scope="col"><?php echo $row_contratos['plan']; ?></th>
    <th width="118" class="Estilo36" scope="col">&nbsp;</th>
    <th width="226" class="Estilo36" scope="col">&nbsp;</th>
    <th width="101" class="Estilo36" scope="col">&nbsp;</th>
    <th width="210" class="Estilo36" scope="col">&nbsp;</th>
    <th width="325" class="Estilo36" scope="col">&nbsp;</th>
    <th width="63" class="Estilo36" scope="col">&nbsp;</th>
    <th width="176" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th height="49" colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  
  
  <tr>
    <th height="42" class="Estilo36" scope="col">&nbsp;</th>
    <th valign="top" class="Estilo36" scope="col">&nbsp;</th>
    <th class="Estilo36" scope="col"><?php echo $row_contratos['numero']; ?></th>
    <th colspan="2" class="Estilo36" scope="col"><?php echo $row_contratos['servicio']; ?></th>
    <th class="Estilo36" scope="col">&nbsp;</th>
    <th class="Estilo36" scope="col"><?php echo $row_contratos['semanal']; ?></th>
    <th class="Estilo36" scope="col"><div align="center"><?php echo $row_contratos['mensual']; ?></div></th>
    <th class="Estilo36" scope="col">&nbsp;</th>
    <th class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col"> <span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_contratos['servicio']; ?></th>
  </tr>
  <tr>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
    <th height="40" colspan="3" class="Estilo36" scope="col"><div align="left"><?php echo $row_clientes['nombres']; ?></div></th>
    <th height="40" class="Estilo36" scope="col"><div align="left"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;</span><?php echo $row_clientes['edad']; ?></div></th>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
    <th height="40" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th height="46" colspan="6" class="Estilo36" scope="col"><div align="left"><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_clientes['ciudad']; ?></div></th>
    <th height="46" colspan="2" class="Estilo36" scope="col"><div align="left"> <span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo $row_clientes['direccion']; ?></div></th>
    <th height="46" class="Estilo36" scope="col">&nbsp;</th>
    <th height="46" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th height="56" colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  
  <tr>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col"> <span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>EDAD</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
    <th height="47" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th height="63" colspan="10" valign="bottom" class="Estilo36" scope="col"><table height="63" width="1507" border="0">
      <tr bordercolor="#000000">
        <td width="996"><div align="left">&nbsp;<span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;</span>&nbsp;&nbsp;<span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="Estilo36 Estilo16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;
              <?php if($totalRows_familiares>=$cont) echo $row_fam['nombres']; ?>
        </div></td>
        <td width="111">
          
            <div align="center">
              <?php if($totalRows_familiares>=$cont) echo $row_fam['edad']; ?>
          </div></td>
        <td width="94"><div align="center">
          <?php if($totalRows_familiares>=$cont) echo $row_fam['dia']; ?>
        </div></td>
        <td width="121"><div align="center">
          <?php if($totalRows_familiares>=$cont) echo $row_fam['mes']; ?>
        </div></td>
        <td width="163"><div align="center">
          <?php if($totalRows_familiares>=$cont) echo $row_fam['ano']; ?>
        </div></td>
      </tr>
    </table></th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" class="Estilo36" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr class="Estilo36">
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="10" scope="col">&nbsp;</th>
  </tr>
</table>
</body>
</html>
