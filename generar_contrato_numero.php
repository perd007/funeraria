<?php require_once('Connections/funeraria.php'); ?>
<?php

$numero=$_POST['numero'];

mysql_select_db($database_funeraria, $funeraria);
$query_contratos = "SELECT * FROM contratos where numero='$numero'";
$contratos = mysql_query($query_contratos, $funeraria) or die(mysql_error());
$row_contratos = mysql_fetch_assoc($contratos);
$totalRows_contratos = mysql_num_rows($contratos);


if($totalRows_contratos==0){
	echo "<script type=\"text/javascript\">alert ('No existe contratos con este numero'); location.href='javascript:close()' </script>";
    exit;
	}

mysql_select_db($database_funeraria, $funeraria);
$query_clientes = "SELECT * FROM clientes where cedula='$row_contratos[cliente]'";
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
$query_familiares = "SELECT * FROM familiares where familiar='$row_contratos[cliente]' ";
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
<title>Generar Contrato por Numero de Contrato</title>
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

<body onload="window.print();">
<p>&nbsp;</p>
<p><strong>PLAN:</strong><?php echo $row_contratos['plan']; ?></p>
<table width="854" height="351" border="0" align="center">
  <tr>
    <td colspan="4"><div align="center"><img src="imagenes/logo.jpg" width="216" height="216" /></div></td>
  </tr>
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
    <td width="247" height="13">CONTRATO</td>
    <td width="246">VALOR SERVICIO </td>
    <td width="186">PAGO SEMANAL </td>
    <td width="159">PAGO ANUAL </td>
  </tr>
  <tr>
    <td height="14">N&deg;&nbsp;&nbsp;<?php echo $row_contratos['numero']; ?></td>
    <td height="14">Bs&nbsp;&nbsp;<?php echo $row_contratos['servicio']; ?></td>
    <td height="14">Bs&nbsp;&nbsp;<?php echo $row_contratos['semanal']; ?></td>
    <td height="14">Bs&nbsp;<?php echo $row_contratos['mensual']; ?></td>
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
    <td colspan="4"><table width="916" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
      <tr>
        <th width="527" scope="col">NOMBRES Y APELLIDOS </th>
        <th width="101" scope="col">EDAD</th>
        <th width="101" scope="col">DIA</th>
        <th width="101" scope="col">MES</th>
        <th width="74" scope="col">A&Ntilde;O</th>
      </tr>
	 
      
        <?php $cont=1;  do { 
		?>
		<tr>
          <td><div align="left"><?php echo $cont.")"; ?>&nbsp;&nbsp;<?php if($totalRows_familiares>=$cont) echo $row_familiares['nombres']; ?></div></td>
          <td><div align="center"><?php if($totalRows_familiares>=$cont) echo $row_familiares['edad']; ?></div></td>
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
    <td colspan="4"><table width="568" border="0" align="center">
      <tr>
        <td width="249"><div align="left"><?php echo $row_contratos['ciudad']; ?></div></td>
        <td width="96"><div align="center"><?php echo $row_contratos['dia']; ?></div>
          </td>
        <td width="99"><div align="center"><?php echo $row_contratos['mes']; ?></div>
          </td>
        <td width="106"><div align="left"><?php echo $row_contratos['ano']; ?></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="4"><table width="492" border="0" align="center">
      <tr>
        <td width="250"><div align="left"><strong>Ciudad</strong></div></td>
        <td width="66"><div align="left"><strong>Dia</strong></div></td>
        <td width="81"><div align="center"><strong>Mes</strong></div></td>
        <td width="77"><div align="left"><strong> &nbsp;&nbsp;A&ntilde;o</strong></div></td>
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

mysql_free_result($contratos);
?>
