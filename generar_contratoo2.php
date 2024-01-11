<?php require_once('Connections/funeraria.php'); ?>
<?php


$cedula=$_POST['clientes'];

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula=$cedula";
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
$query_familiares = "SELECT * FROM familiares where familiar=$cedula ";
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
.Estilo3 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>
<p><strong>PLAN:</strong><? echo $_POST['plan']; ?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="854" height="351" border="0" align="center">
  <tr>
    <td colspan="4"><div align="center" class="Estilo1">Funeraria Amazonas, C.A </div></td>
  </tr>
  <tr>
    <td height="19" colspan="4"><div align="center" class="Estilo2">INSCRITA EN LE REGISTRO DE COMERCIO - BAJO EL N&deg; 02-FOLIOS 173 AL 177 </div></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><div align="center" class="Estilo3">CONTRATO DE SERVICIO FUNERARIO </div></td>
  </tr>
  <tr>
    <td height="21" colspan="4"><div align="center">Avenida la Guardia c/c Barrio Union - Telf.:(0248) 521.4108 - Puerto Ayacucho - Edo. Amazonas </div></td>
  </tr>
  <tr>
    <td height="13" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="13" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="13">CONTRATO</td>
    <td>VALOR SERVICIO </td>
    <td>PAGO SEMANAL </td>
    <td>PAGO ANUAL </td>
  </tr>
  <tr>
    <td height="14">N&deg;&nbsp;&nbsp;<? echo $_POST['contrato']; ?></td>
    <td height="14">Bs&nbsp;&nbsp;<? echo $_POST['valor']; ?></td>
    <td height="14">Bs&nbsp;&nbsp;<? echo $_POST['pagos']; ?></td>
    <td height="14">Bs&nbsp;&nbsp;<? echo $_POST['pagoa']; ?></td>
  </tr>
  <tr>
    <td height="21" colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">Esta empresa, que en adelante se llamara &quot;LA COMPA&Ntilde;IA&quot; conforme a la solicitud y de acuerdo a las condiciones inscritas al </td>
  </tr>
  <tr>
    <td height="21" colspan="4">dorso, proporcionara un servicio funerario por valor de Bs: <?php echo $row_clientes['valor']; ?></td>
  </tr>
  <tr>
    <td height="21" colspan="4">al fallecimiento del contratante Sr(a) &nbsp;&nbsp;&nbsp;<?php echo $row_clientes['nombres']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['edad']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&ntilde;os</td>
  </tr>
  <tr>
    <td colspan="4">de edad, domiciliado en Ciudad, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row_clientes['ciudad']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">direccion <?php echo $row_clientes['direccion']; ?></td>
  </tr>
  <tr>
    <td colspan="4">y de los familiares que aparezcan hasta el numero siete en el siguiente. CUADRO FAMILIAR </td>
  </tr>
  <tr>
    <td colspan="4"><table width="831" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <th width="527" scope="col">NOMBRES Y APELLIDOS </th>
        <th width="101" scope="col">DIA</th>
        <th width="101" scope="col">MES</th>
        <th width="74" scope="col">A&Ntilde;O</th>
      </tr>
	 
      
        <?php $cont=1;  do { 
		?>
		<tr>
          <td><div align="left"><?php echo $cont.")"; ?>&nbsp;&nbsp;<?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?></div></td>
          <td><div align="center"><?php if($totalRows_familiares>=$cont) echo $row_familiares['dia']; ?></div></td>
          <td><div align="center"><?php if($totalRows_familiares>=$cont) echo $row_familiares['mes']; ?></div></td>
          <td><div align="center"><?php if($totalRows_familiares>=$cont) echo $row_familiares['ano']; ?></div></td>
		  </tr>
          <?php $cont++; } while ($row_familiares = mysql_fetch_assoc($familiares)); ?>

    </table></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><strong>OBSERVACIONES</strong>:<?php echo $row_clientes['observaciones']; ?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="343" border="0" align="center">
      <tr>
        <td><div align="center"><?php echo $_POST['ciudad']; ?></div></td>
        <td><div align="center"><?php echo $_POST['dia']; ?></div></td>
        <td><div align="center"><?php echo $_POST['mes']; ?></div></td>
        <td><div align="center"><?php echo $_POST['ano']; ?></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="4"><table width="343" border="0" align="center">
      <tr>
        <td width="90"><div align="center"><strong>Ciudad</strong></div></td>
        <td width="81"><div align="center"><strong>Dia</strong></div></td>
        <td width="75"><div align="center"><strong>Mes</strong></div></td>
        <td width="79"><div align="center"><strong>A&ntilde;o</strong></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><table width="850" border="0">
      <tr>
        <td width="439"><div align="center">______________________</div></td>
        <td width="401"><div align="center">______________________</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4"><table width="850" border="0">
      <tr>
        <td width="439"><div align="center">Firma Autorizada </div></td>
        <td width="401"><div align="center">Sello</div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($familiares);
?>
