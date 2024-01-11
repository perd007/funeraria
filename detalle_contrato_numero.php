<?php require_once('Connections/funeraria.php'); ?>
<?php 

$id=$_GET["id"];

mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where id=$id";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$row_contratos[cliente]'";
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
.bordes {	border: medium solid #000000;
}
-->
</style>
</head>

<body>
<table width="495" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="bordes">
  <tr>
    <th colspan="2" bgcolor="#CCCCCC" scope="row">CONTRATO</th>
  </tr>
  <tr>
    <th colspan="2" scope="row">Por favor ingrese los siguinetes datos </th>
  </tr>
  <tr>
    <th scope="row"><div align="right">CLIENTE</div></th>
    <td><?php echo $row_clientes['nombres']; ?></td>
  </tr>
  <tr>
    <th width="215" scope="row"><div align="right">PLAN</div></th>
    <td width="268"><?php echo $row_contratos['plan']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">CONTRATO N&deg; </div></th>
    <td><?php echo $row_contratos['numero']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">VALOR SERVICIO </div></th>
    <td><?php echo $row_contratos['servicio']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">PAGO SEMANAL </div></th>
    <td><?php echo $row_contratos['semanal']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">PAGO ANUAL </div></th>
    <td><?php echo $row_contratos['mensual']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">CIUDAD</div></th>
    <td><?php echo $row_contratos['ciudad']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">DIA</div></th>
    <td><?php echo $row_contratos['dia']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">MES</div></th>
    <td><?php echo $row_contratos['mes']; ?></td>
  </tr>
  <tr>
    <th scope="row"><div align="right">A&Ntilde;O</div></th>
    <td><?php echo $row_contratos['ano']; ?></td>
  </tr>
  <tr>
    <th colspan="2" scope="row"><label>
      <a href="consulta_contrato_numero2.php?numero=<?php echo $row_contratos['numero']; ?>"><input type="button" name="Submit" value="REGRESAR" /></a>
    </label></th>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($contratos);

mysql_free_result($clientes);
?>
